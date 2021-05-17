<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'month','created_times', 'lated_times',
    ];

    protected $hidden = [
        'id', 'user_id',
    ];

    public function user()
    {
        return $this->belongTo('App\User');
    }
}
