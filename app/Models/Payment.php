<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function scopeLastDay($query)
    {
        $query->whereBetween('created_at', [
            Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()
        ]);
    }

    public function scopeLastWeek($query)
    {
        $query->whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()
        ]);
    }

    public function scopeLastMonth($query)
    {
        $query->whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()
        ]);
    }

}
