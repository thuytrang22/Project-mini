<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {

        $request->validate([
            'full_name' => 'required|string',
            'birthday' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
        User::create([
            'full_name' => ucwords($request->full_name),
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => ucwords($request->address),
        ]);
        return to_route('users.index')->with('store', 'success');
    }
}

