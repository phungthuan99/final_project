<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'fullname', 'email', 'address', 'phone', 'class_id', 'date_of_birth','status'
    ];
}
