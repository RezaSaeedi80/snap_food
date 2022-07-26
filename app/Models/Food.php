<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'resturant_id', 'materials', 'offer_id'
    ];

    protected $appends = ['price_with_offer', 'type', 'count_item'];

    public function getPriceWithOfferAttribute()
    {
        return ($this->offer_id !== null)
                ? ((100 - $this->offer->persent) / 100) * $this->price
                : $this->price;
    }

    public function getCountItemAttribute()
    {
        return $this->cartItems->sum('quantity');
    }

    public function getTypeAttribute()
    {
        return $this->categories->first()->name;
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
