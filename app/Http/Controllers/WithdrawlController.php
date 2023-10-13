<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Exception;
use Illuminate\Http\Request;

class WithdrawlController extends Controller
{
    public function __construct(
        public TransactionService $transactionService
    ) {
    }

    public function index()
    {
        $transactions = $this->transactionService->withdrawList();
        return view('withdrawal.index', compact('transactions'));
    }

    public function create()
    {
        return view('withdrawal.create');
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user();
            $data = $this->validate($request, [
                'amount' => 'required|lte:' . $user->balance,
                'date' => 'required',
            ]);

            if ($this->transactionService->newWithdraw(...$data)) {
                return redirect()
                    ->route('withdrawal.index')
                    ->with('success', __('Withdrawal has been created'));
            } else {
                return back()->with('error', __('Something went wrong'));
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
