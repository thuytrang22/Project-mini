<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)  {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
}
