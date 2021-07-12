<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\User;

class Role extends Model
{
    const ADMIN = 1;
    const MANAGER = 2;
    const USER = 3;
    
    public function users(){
        return $this->belongsToMany(User::class, 'role_user', 'user_id', 'role_id');
    }
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
