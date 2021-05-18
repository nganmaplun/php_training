<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Timesheet;
use App\Models\Report;
use App\Models\Team;
use App\Models\Role;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'desc', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
