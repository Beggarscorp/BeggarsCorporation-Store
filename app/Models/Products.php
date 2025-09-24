<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'slug',
        'description',
        'price',
        'size_and_fit',
        'material_and_care',
        'specification',
        'product_color_id',
        'category_id',
        'impact_product_by',
        'stock',
        'min_order_quantity',
        'productImage',
        'productGalleryImages'
    ];
}
