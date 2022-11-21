<?php

namespace App\core\Repositories;

interface IUserRepository
{
    public function getAll($keywords);

    public function find($id);

    public function store( $user);

    public function update($id, $user);

    public function destroy($id);
}
