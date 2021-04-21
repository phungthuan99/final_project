<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question_test extends Model
{
    public $table = "questions_test";


    protected $fillable = [
        'question', 'answer', 'correct_answer','user_id','status','level_id','quiz_id',
    ];


    public function userName()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
