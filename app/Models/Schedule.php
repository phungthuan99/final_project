<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'user_id','student_id','level_id', 'class_id','weekday','slot','teacher_id','time',
    ];

    public function getClass()
    {
        return $this->beLongsTo('App\Models\Classes', 'class_id','id');
    }

    public function getNameTeacher()
    {
        return $this->beLongsTo('App\Models\User', 'teacher_id','id');
    }

}
