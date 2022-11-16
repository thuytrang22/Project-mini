<?php

namespace App\Http\Controllers;

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
        $arr = [
            'status' => true,
            'message' => "Danh sách user",
            'data' => UserResource::collection($users)
        ];
        return response()->json($arr, 200);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        User::create($data);
        return response()->json(['massage'=>'success']);
    }

    public function show(User $user, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            $arr = [
                'success' => false,
                'message' => 'Không có user này',
                'dara' => []
            ];
            return response()->json($arr, 200);
        }
        $arr = [
            'status' => true,
            'message' => "Chi tiết user ",
            'data' => new UserResource($user)
        ];
        return response()->json($arr, 201);

    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        User::create($data);


        $user->full_name =$data['full_name'];
        $user->birthday =$data['birthday'];
        $user->email =$data['email'];
        $user->phone =$data['phone'];
        $user->address =$data['address'];
        $user->save();
        $arr = [
            'status' => true,
            'message' => 'User cập nhật thành công',
            'data' => new UserResource($user)
        ];
        return response()->json(['massage'=>'success']);

    }

    public function destroy(User $user)
    {
        $user->delete();
        $arr = [
            'status' => true,
            'message' => 'User đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
