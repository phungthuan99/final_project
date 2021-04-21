<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizTest extends Model
{
    public $table = "quiz_test";

    protected $fillable = [
        'quiz', 'level_id', 'user_id','time','status',
    ];

    public function userName()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
