<?php 
namespace App\Services\Interfaces;

use App\User;
use Illuminate\Http\Request;

interface UserServiceInterface {
    public function getList();
    public function deleteUser(User $user);
    public function updateUser(User $user, Request $request);
}