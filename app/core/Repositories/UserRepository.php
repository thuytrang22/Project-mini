<?php

namespace App\core\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;

class UserRepository implements IUserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll($keywords)
    {
        $users = User::all();
        if ($keywords) {
            $users = User::where('full_name', 'like',  '%' . $keywords . '%')
                ->orderBy('id', 'desc')->Paginate(config('constants.PAGINATION'));
        }
        return $users;
    }

    public function find($id)
    {
        return $this->user->findOrFail($id);
    }

    public function store($user)
    {
        return $this->user->create($user);
    }

    public function update($id = null, $users = [] )
    {
        /*$user = $this->find($id);
        return $user->update($user);*/
        if(is_null($id)) {
            $user = new User;
            $user->full_name = $users['full_name'];
            $user->birthday = $users['birthday'];
            $user->email = $users['email'];
            $user->phone = $users['phone'];
            $user->address = $users['address'];
            return $user->save();
        }
        $user = User::find($id);
        $user->full_name = $users['full_name'];
        $user->birthday = $users['birthday'];
        $user->email = $users['email'];
        $user->phone = $users['phone'];
        $user->address = $users['address'];
        return $user->save();
    }

    public function destroy($id)
    {

        return $this->user->destroy($id);
    }
}
