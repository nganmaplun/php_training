<?php
namespace App\Services;

use App\User;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface;

class UserService extends Service implements UserServiceInterface {
    public function getList()
    {
        $users = User::all();
        return $users;
    }

    public function updateUser(User $user, Request $request)
    {
        if($user->roles()->sync($request->get('roles'))){
            return 1;
        } else {
            return 0;
        }
    }
    public function deleteUser(User $user)
    {
        return $user->delete();
    }
}