<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'level',
        'description',
        'fee',
        'user_id',
        'image'
    ];
    public function CountClass()
    {
        return $this->hasMany('App\Models\Classes', 'level_id', 'id');
    }

    public function Countquestion_test()
    {
        return $this->hasMany('App\Models\Question_test', 'level_id', 'id');
    }

    public function Countquestion_quiz()
    {
        return $this->hasMany('App\Models\QuizTest', 'level_id', 'id');
    }
}
