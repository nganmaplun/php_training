<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'desc', 'use_time',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id',
    ];

    public function timesheets()
    {
        return $this->belongsToMany('App\Model\TimeSheet');
    }
}
