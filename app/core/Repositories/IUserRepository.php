<?php

namespace App\core\Repositories;

interface IUserRepository
{
    public function paginate();

    public function find($id);

    public function store(array $user);

    public function update($id, array $user);

    public function destroy($id);

    public function search(array $user );
}
