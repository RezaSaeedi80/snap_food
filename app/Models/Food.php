<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'resturant_id', 'materials'
    ];

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
