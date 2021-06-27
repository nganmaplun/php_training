<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return $user->hasRole('admin');
    }

    public function edit(User $user, $user2)
    {
        return $user === $user2;
    }
    public function delete(User $user, $user1)
    {
        return $user->hasRole('admin');
    }
}
