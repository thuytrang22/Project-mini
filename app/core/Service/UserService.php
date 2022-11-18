<?php

namespace App\core\Service;
use App\Http\Controllers\Request;
use App\core\Repositories\UserRepository;

class UserService extends UserRepository
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        return $this->repository = $repository;
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create(array $user)
    {
        return $this->repository->create($user);

    }

    public function update($id, $user)
    {
        return $this->repository->update($id, $user);
    }

    public function delete($id)
    {
        return $this->repository->deleteUser($id);
    }
    public function search ($user)
    {

    }
}
