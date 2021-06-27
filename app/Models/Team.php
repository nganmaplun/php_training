<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function users()
    {
        $this->belongsToMany(User::class,'team_user','user_id','team_id');
    }
}
