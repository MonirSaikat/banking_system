<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\TransactionService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    public function __construct(
        public TransactionService $transactionService
    ) {
    }

    public function index()
    {
        return view('deposit.index');
    }

    public function create()
    {
        return view('deposit.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $this->validate($request, [
                'amount' => 'required',
                'date' => 'required',
            ]);

            if ($this->transactionService->newDeposit(...$data)) {
                return redirect()
                    ->route('deposit.index')
                    ->with('success', __('Deposit has been created'));
            } else {
                return back()->with('error', __('Something went wrong'));
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
