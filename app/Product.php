<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
