<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type'
    ];

    public function foods()
    {
        return $this->morphedByMany(Food::class, 'categorizable');
    }

    public function resturants()
    {
        return $this->morphedByMany(Resturant::class, 'categorizable');
    }
}
