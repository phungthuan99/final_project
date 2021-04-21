<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [
        'course_id', 'total','level_fee'
    ];
}
