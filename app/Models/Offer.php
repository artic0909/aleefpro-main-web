<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';

    protected $fillable = [
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
