<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'content',
        'type',
        'image',
        'status',
        'user_id',
        'category_id',
    ];

    public function categoryName()
    {
        return $this->belongsTo('App\Models\Category' ,'category_id', 'id');
    }
}
