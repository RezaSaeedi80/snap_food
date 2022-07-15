<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id', 'status', 'totalPrice'
    ];

    public const STATUS = [
        'pending', 'preparing', 'sending', 'delivered'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
