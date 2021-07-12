<?php
namespace App\Services;

use App\User;
use App\Services\Interfaces\UserServiceInterface;

class UserService extends Service implements UserServiceInterface {
    public function getList()
    {
        $users = User::all();
        return $users;
    }

    public function deleteUser(User $user)
    {
        return $user->delete();
    }
}