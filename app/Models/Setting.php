<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo','slogan','email','phone','banner','welcome','welcome_content','welcome_image','breadcrumb','fanpage','address'
    ];
}
