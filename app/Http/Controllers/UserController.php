<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditRequests;
use Illuminate\Http\Request;
use App\Http\Model;

class UserController extends Controller
{

    public function index(Request $request){
        $search = $request->search;
        $users = User::where('full_name',  'like', '%' . $search . '%' )->orderBy('id', 'desc')->paginate(20);
        return view('users.index', compact('users'));
    }
    public function edit(User $user)
    {

        return view('users.edit');
    }
    public function update(EditRequests $request)
    {
        //
    }
}
