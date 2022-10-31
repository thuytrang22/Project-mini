<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $users = User::where('full_name',  'like', '%' . $search . '%' )->orderBy('id', 'desc')->paginate(20);
        return view('users.index', compact('users'));
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User has been deleted successfully');
    }
}
