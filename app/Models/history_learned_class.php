<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History_learned_class extends Model
{
    public $table ='history_learned_class';

    public function className()
    {
        return $this->belongsTo('App\Models\Classes','class_id','id');
    }

    public function levelName()
    {
        return $this->belongsTo('App\Models\Level', 'level_id','id');
    }

    public function courseName()
    {
        return $this->belongsTo('App\Models\Course', 'course_id','id');
    }
}