<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model;

class UserController extends Controller
{

    public function index(Request $request){
        $search = $request->search;
        $users = User::where('full_name',  'like', '%' . $search . '%' )->orderBy('id', 'desc')->paginate(20);
        return view('users.index', compact('users'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'full_name',
            'birthday' => 'birthday',
            'email' => 'email',
            'phone' => 'phone',
            'address' => 'address',
        ]);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User has Been updated successfully');
    }
}
