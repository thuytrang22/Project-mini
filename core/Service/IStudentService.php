<?php

namespace core\Service;

interface IStudentService
{
    public function getAll($keywords);

    public function find($id);

    public function store($data);

    public function update($id, $data);

    public function destroy($id);

}
