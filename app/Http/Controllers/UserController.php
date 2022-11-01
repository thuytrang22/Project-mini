<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::where('full_name', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(20);
        return view('users.index', compact('users'));
    }

}
