<?php

namespace core\Service;

use App\Http\Controllers\Request;
use Core\Repositories\StudentRepository;

class StudentService extends StudentRepository
{
    protected StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        return $this->studentRepository = $studentRepository;
    }

    public function getAll($keywords)
    {
        return $this->studentRepository->getAll($keywords);
    }

    public function find($id)
    {
        return $this->studentRepository->find($id);
    }

    public function store($data)
    {
        return $this->studentRepository->store($data);

    }

    public function update($id, $data )
    {
        return $this->studentRepository->edit($id, $data);
    }

    public function destroy($id)
    {
        return $this->studentRepository->destroy($id);

    }
}
