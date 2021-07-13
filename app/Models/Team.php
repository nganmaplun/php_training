<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Team extends Model
{
    protected $fillable = [
        'name', 'manager_id'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_user', 'team_id', 'user_id');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
