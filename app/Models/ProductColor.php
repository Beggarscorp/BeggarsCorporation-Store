<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = 'product_colors';
    protected $fillable = [
        'color_name',
        'hex_code'
    ];
}
