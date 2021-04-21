<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homeworks_history extends Model
{
    public $table ='homeworks_history';

    protected $fillable = [
        'quiz','level_id','student_id','question_and_answer','correct_answer','timeout','timetart','selected_answer','score',
    ];
}
