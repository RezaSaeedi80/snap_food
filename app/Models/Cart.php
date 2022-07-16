<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'resturant_id', 'is_pay'
    ];

    public function finalPrice()
    {
        return $this->load('cartItems.food')->cartItems
            ->map(fn ($cartItem) => $cartItem->food->price_with_offer * $cartItem->quantity)
            ->sum();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Cart::class);
    }
}
