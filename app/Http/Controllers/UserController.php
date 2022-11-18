<?php

namespace App\Http\Controllers;

use App\core\Service\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $users = $this->service->paginate();
        return view('users.index', compact("users"));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $this->service->create($request->validate());
        return redirect()->route('users.index');
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
        $this->service->destroy($id);
        return redirect()->route('users.index');
    }
}
