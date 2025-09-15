<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'categoryName',
        'slug',
        'image',
        'parent_id',
    ];
}
