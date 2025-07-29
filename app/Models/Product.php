<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_id',
        'product_name',
        'images',
        'sizes',
        'colors',
        'description',
        'information',
        'actual_price',
        'selling_price',
        'size_chart_image',
        'slug',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

        public function mainCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    
}
