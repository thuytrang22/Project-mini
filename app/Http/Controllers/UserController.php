<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::where('full_name', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User has been deleted successfully');
    }
}
