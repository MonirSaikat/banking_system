<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'account_type' => 'required',
            'password' => 'required|confirmed'
        ]);

        User::create($data);

        return redirect()->route('login')->with('success', __('You can login now.'));
    }
}
