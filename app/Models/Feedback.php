<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'content','score','student_id','class_id'
    ];

    public function studentName()
    {
        return $this->belongsTo('App\Models\Student','student_id','id');
    }
    public function className()
    {
        return $this->belongsTo('App\Models\Classes','class_id','id');
    }
    

}
