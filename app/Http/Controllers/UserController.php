<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->keyword;
//        define("paginate",20);
        if ($keywords != '') {
            $users = User::where('full_name', 'like', '%' . $keywords . '%')
                ->orderBy('id', 'desc')->$result = MyModel::paginate($per_page, $columns, config('app.page_name'));
        } else {
            $users =User::orderBy('id', 'desc')->Paginate(20);
            return view('users.index', compact('users'));
        }
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'birthday' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
        User::create([
            'full_name' => ucwords($request->full_name),
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => ucwords($request->address),
        ]);
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

    public function update(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'required',
            'birthday' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ], [], [
            'full_name' => 'full_name',
            'address' => 'address'
        ]);
        $user->update([
            'full_name' => ucwords($request->full_name),
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => ucwords($request->address),
        ]);
        return to_route('users.index')->with('update', 'success');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User has been deleted successfully');
    }
}
