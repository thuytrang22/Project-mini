<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keywords = trim($request->keywords);
        if ($keywords != '') {
            $users = User::where('full_name', 'like', '%' . $keywords . '%')
                ->orderBy('id', 'desc')->Paginate(config('constants.PAGINATION'));
        } else {
            $users = User::orderBy('id', 'desc')->Paginate(config('constants.PAGINATION'));

        }
        return view('users.index', compact('users'));
        /*return response()->json($users);*/
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        User::create($data);

        return to_route('users.index')->with('store', 'success');
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(UserRequest $request)
    {
        $data = $request->validated();
        User::updated($data);
        return to_route('users.index')->with('update', 'success');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User has been deleted successfully');
    }
}
