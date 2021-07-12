<?php 
namespace App\Services\Interfaces;

use App\User;

interface UserServiceInterface {
    public function getList();
    public function deleteUser(User $user);
}