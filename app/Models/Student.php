<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $fillable = [
        'fullname', 'email', 'address', 'phone', 'code', 'class_id', 'date_of_birth', 'avatar','status','password','fee_status',
    ];
    public function ClassName()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id', 'id');
    }
}