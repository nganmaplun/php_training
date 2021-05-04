<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Timesheet extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'date', 'problem', 'plan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id', 'user_id'
    ];

    public function tasks()
    {
        return $this->belongsToMany('App\Model\Task');
    }
    public function user()
    {
        return $his->belongsTo('App\User');
    }
}
