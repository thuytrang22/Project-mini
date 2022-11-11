<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @var User
     */
    protected $user=null;

    /**
     * UserRepository constructor
     *
     * @param User $user
     */
    /**
     * @return User|null
     */
    public function getAllUser()
    {
        return User::all();
    }
    public function getUserById($id)
    {
        return User::find($id);
    }
    public function createUser($id = null, $collection = []){
            $user =new User;
            $user->name = $collection['name'];
            $user->birthday = $collection['birthday'];
            $user->email = $collection['email'];
            $user->phone = $collection['phone'];
            $user->address = $collection['address'];
            $user->save();
    }
    public function showUser($id)
    {
        return User::find($id)->show();

    }
    public function updateUser($id, array $user){

     /* User::find($id)->update([
        'name' = $user['name'],
        'birthday' = $user['birthday'],
        'email' = $user['email'],
        'phone' = $user['phone'],
        'address' = $user['address']
        ]);*/

    }

    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}
