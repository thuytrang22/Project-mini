<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditRequests;
use Illuminate\Http\Request;
use App\Http\Model;

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

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(EditRequests $request)
    {
        $user = $request->validated();
        $user->update([
            'full_name' => ucwords($request->full_name),
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => ucwords($request->address),
        ]);
        return to_route('users.index')->with('update', 'success');
    }
}
