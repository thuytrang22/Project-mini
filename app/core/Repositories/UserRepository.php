<?php

namespace App\core\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserRepository implements IUserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function paginate()
    {
        return $this->user->paginate(10);
    }

    public function find($id)
    {
        return $this->user->findOrFail($id);
    }

    public function store(array $user)
    {
        return $this->user->store($user);
    }

    public function update($id, array $user)
    {
        $user = $this->find($id);
        return $user->update($user);

    }

    public function destroy($id)
    {
        $user = $this->find($id);
        return $user->destroy($id);
    }

    public function search($user)
    {

    }

}
