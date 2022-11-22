<?php

namespace core\Repositories;

use App\Models\User;
use Core\Repositories\IStudentRepository;
class StudentRepository implements IStudentRepository
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
            $users = User::where('full_name', 'like', '%' . $keywords . '%')
                ->orderBy('id', 'desc')->paginate(/*config('constants.PAGINATION')*/ 10);
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

    public function update($id, $user)
    {
        $data = $this->find($id,);
        return $data->update($user);
    }

    public function destroy($id)
    {
//        $user = $this->find($id);
        return $this->user->destroy($id);
    }
}
