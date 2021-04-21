<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name','user_id','start_date','finish_date'
    ];

    public function userName()
    {
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }


    
}
