<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->with('error', __('Invalid credentials'));
    }

    public function logout() {
        auth()->logout();

        return redirect()->route('login');
    }
}
