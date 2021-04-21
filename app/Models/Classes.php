<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'name','user_id','teacher_id','level_id', 'course_id', 'status','number_of_sessions','start_date','finish_date'
    ];

    public function userName()
    {
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }

    public function courseName()
    {
        return $this->belongsTo('App\Models\Course', 'course_id','id');
    }

    public function CountClass()
    {
        return $this->hasMany('App\Models\Classes', 'course_id', 'id');
    }

    public function CountStuden()
    {
        return $this->hasMany('App\Models\Student', 'class_id', 'id');
    }

    public function class_course()
    {
        return $this->belongsTo('App\Models\Classes', 'course_id','id');
    }

    public function teacherName()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function Get_teacher_Name()
    {
        return $this->belongsTo('App\Models\User', 'teacher_id','id');
    }


    public function levelName()
    {
        return $this->belongsTo('App\Models\Level', 'level_id','id');
    }

}
