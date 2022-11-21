<?php

namespace App\core\Service;

use App\Http\Controllers\Request;
use App\core\Repositories\UserRepository;
use App\Models\User;
use Carbon\Carbon;

class UserService extends UserRepository
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        return $this->repository = $repository;
    }

    public function getAll($keywords)
    {
        return $this->repository->getAll($keywords);
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($user)
    {
        return $this->repository->store($user);

    }

    public function update($id = null, $users = [])
    {
        return $this->repository->edit($id, $users);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);

    }
}
