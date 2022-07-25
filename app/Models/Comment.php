<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'cart_id', 'message', 'parent_id', 'score', 'is_approve'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class);
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
