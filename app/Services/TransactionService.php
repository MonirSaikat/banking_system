<?php

namespace App\Services;

use App\Events\FundsDeposited;
use App\Models\Transaction;
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
}
