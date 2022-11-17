<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\User as UserResource;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        User::create($data);
        return response()->json(['massage' => 'success']);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user, 'User retrieved successfully.']);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return response()->json([
            'massage' => 'User updated successfully!',
            'data' => $data
        ]);

    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'status' => true,
            'message' => "User deleted successfully!",
        ], 200);
    }
}
