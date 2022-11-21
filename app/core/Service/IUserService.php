<?php

namespace App\core\Service;

interface IUserService
{
    public function getAll($keywords);

    public function find($id);

    public function store($user);

    public function update($id, $users);

    public function destroy($id);

}
