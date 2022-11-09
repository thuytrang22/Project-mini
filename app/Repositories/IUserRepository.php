<?php
namespace App\Repositories;

interface IUserRepository
{
    public function getAllUsers();
    public function createOrStore();
    public function deleteUser($id);

}
