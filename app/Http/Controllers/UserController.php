<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
       /* Post::create($form->validatedInputs());*/
    }
}

