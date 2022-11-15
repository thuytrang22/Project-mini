<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $arr = [
            'status' => true,
            'message' => "Danh sách user",
            'data'=>UserResource::collection($users)
        ];
        return response()->json($arr, 200);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $input = $request->validated();
        if($input->fails()){
            $arr = [
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $input->errors()
            ];
            return response()->json($arr, 200);
        }
        User::create($input);
        $arr = ['status' => true,
            'message'=>"User đã lưu thành công",
            'data'=> new UserResource($input)
        ];
        return response()->json($arr, 201);
    }

    public function show(User $user,$id)
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
            'data'=> new UserResource($user)
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
        $input = $request->validator();
        if($input->fails()){
            $arr = [
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $input->errors()
            ];
            return response()->json($arr, 200);
        }
        $user->full_name = $input['full_name'];
        $user->birthday = $input['birthday'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->address = $input['address'];
        $user->save();
        $arr = [
            'status' => true,
            'message' => 'User cập nhật thành công',
            'data' => new UserResource($user)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        $arr = [
            'status' => true,
            'message' =>'User đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
