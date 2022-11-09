<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $keywords = trim($request->keywords);
        if ($keywords != '') {
            $users = User::where('full_name', 'like', '%' . $keywords . '%')
                ->orderBy('id', 'desc')->Paginate(config('constants.PAGINATION'));
        } else {
            $users = User::orderBy('id', 'desc')->Paginate(config('constants.PAGINATION'));

        }
        return view('users.index', compact('users'));
    }
}
