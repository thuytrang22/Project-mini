<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'birthday' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'User has been created successfully.');
    }
}
