<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'fullname', 'email', 'code', 'phone', 'question_test_id'
    ];
}
