<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->keyword;
        if ($keywords != '') {
            $users = User::where('full_name', 'like', '%' . $keywords . '%')
                ->orderBy('id', 'desc')->Paginate(config('constants.PAGINATION'));
            return view('users.index', compact('users'));
        } else {
            $users = User::orderBy('id', 'desc')->Paginate(config('constants.PAGINATION'));
            return view('users.index', compact('users'));
        }
    }
}
