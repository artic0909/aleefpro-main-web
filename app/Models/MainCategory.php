<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $fillable = ['main_category_name', 'slug'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'main_category_id');
    }
}
