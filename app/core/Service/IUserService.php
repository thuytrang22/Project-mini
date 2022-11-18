<?php

namespace App\core\Service;

interface IUserService
{
    public function paginate();

    public function find($id);

    public function create(array $user);

    public function update($id, array $user);

    public function destroy($id);

    public function search($user);
}
