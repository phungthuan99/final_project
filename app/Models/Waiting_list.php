<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waiting_list extends Model
{
    protected $table = 'waiting_lists';

    protected $fillable = [
        'fullname', 'email','phone','status','address','date_of_birth','slot','level_id',
    ];
}
