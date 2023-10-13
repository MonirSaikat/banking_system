<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawlController extends Controller
{
    public function index() {
        return view('withdrawal.index');
    }
    
    public function create()
    {
        return view('withdrawal.create');
    }

    public function store()
    {
    }
}
