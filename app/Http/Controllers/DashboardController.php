<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $transactions = auth()
            ->user()
            ->transactions()
            ->paginate(10);

        return view('dashboard', compact('transactions'));
    }
}
