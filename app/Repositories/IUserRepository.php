<?php

namespace App\Repositories;

interface IUserRepository
{
    public function getAllUsers();

    public function getUserById($id);

    public function createUser(array $user);

    public function showUser($id);

    public function updateUser($id, array $user);

    public function deleteUser($id);
}
