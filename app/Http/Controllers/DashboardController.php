<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke() {
        $transactions = auth()->user()->transactions;

        return view('dashboard', compact('transactions'));
    }
}
