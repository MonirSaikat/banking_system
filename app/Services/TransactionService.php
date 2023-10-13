<?php

namespace App\Services;

use App\Events\FundsDeposited;
use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    protected $db;
    protected $auth;

    public function __construct(DB $db, Auth $auth)
    {
        $this->db = $db;
        $this->auth = $auth;
    }

    public function newDeposit($amount, $date)
    {
        $this->db::beginTransaction();
        try {
            Transaction::create([
                'amount' => $amount,
                'date' => $date,
                'user_id' => $this->auth::user()->id,
                'transaction_type' => Transaction::DEPOSIT
            ]);

            event(new FundsDeposited(auth()->user(), $amount));

            $this->db::commit();

            return true;
        } catch (Exception $e) {
            $this->db::rollBack();
            return false;
        }
    }

    public function depositList()
    {
        return Transaction::where('user_id', $this->auth::user()->id)
            ->where('transaction_type', Transaction::DEPOSIT)
            ->paginate(10);
    }

    public function newWithdraw($amount, $date)
    {
        $this->db::beginTransaction();
        try {
            $user = auth()->user();

            $withdrawalRate = ($user->account_type === 'Individual') ? 0.015 : 0.025;

            $withdrawalFee = 0;

            $netWithdrawal = $amount;

            if ($user->account_type === 'Individual') {
                $withdrawalDate = Carbon::createFromFormat('Y-m-d', $date);

                if ($withdrawalDate->dayOfWeek === Carbon::FRIDAY) {
                    $withdrawalFee = 0;
                    $netWithdrawal = $amount;
                }

                if ($amount > 1000) {
                    $withdrawalFee = ($amount - 1000) * $withdrawalRate;
                    $netWithdrawal = $amount - $withdrawalFee;
                } else {
                    $withdrawalFee = 0;
                    $netWithdrawal = $amount;
                }

                $totalWithdrawalThisMonth = Transaction::where('user_id', $user->id)
                    ->whereMonth('date', $withdrawalDate->month)
                    ->where('transaction_type', Transaction::WITHDRAW)
                    ->sum('amount');

                if ($totalWithdrawalThisMonth + $netWithdrawal <= 5000) {
                    $netWithdrawal += $withdrawalFee;
                    $withdrawalFee = 0;
                }
            } else {
                $totalWithdrawal = Transaction::where('user_id', $user->id)
                    ->where('transaction_type', Transaction::WITHDRAW)
                    ->sum('amount');

                if ($totalWithdrawal + $amount > 50000) {
                    $withdrawalRate = 0.015;
                    $withdrawalFee = $amount * $withdrawalRate;
                    $netWithdrawal = $amount - $withdrawalFee;
                }
            }

            Transaction::create([
                'amount' => $netWithdrawal,
                'date' => $date,
                'user_id' => $user->id,
                'transaction_type' => Transaction::WITHDRAW,
                'fee' => $withdrawalFee
            ]);

            event(new FundsDeposited($user, -$netWithdrawal));

            $this->db::commit();

            return true;
        } catch (Exception $e) {
            $this->db::rollBack();
            return false;
        }
    }

    public function withdrawList()
    {
        return Transaction::where('user_id', $this->auth::user()->id)
            ->where('transaction_type', Transaction::WITHDRAW)
            ->paginate(10);
    }
}
