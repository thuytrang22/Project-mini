<?php

namespace App\Http\Controllers;

use App\core\Service\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $keywords = $request->search;
        $users = $this->service->getAll($keywords);
        return view('users.index', compact("users"));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $users = $this->service->store($request->all());
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = $this->service->find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->service->find($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('users.edit');
    }

    public function destroy($id)
    {
        $this->service->delete();
        return view('users.index');
    }
}
