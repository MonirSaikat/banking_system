<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        return view('deposit.create');
    }

    public function create()
    {
        return view('deposit.create');
    }

    public function store()
    {
    }
}
