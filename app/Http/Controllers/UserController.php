<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(){
           $users = User::orderBy('id', 'desc')->paginate(20);
           return view('users.index', compact('users'));
   }
}
