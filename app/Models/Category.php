<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    //

    protected $table = 'categories';
    
    protected static function boot()
    {
        static::creating(function ($category) {
            $category->slug = str::slug($category->name);
        });
    }
}
