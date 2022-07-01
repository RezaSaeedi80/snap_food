<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resturant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'user_id', 'phone', 'account_number', 'lng', 'lat'
    ];

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->hasMany(Food::class);
    }

    public function time_working()
    {
        return $this->hasOne(TimeWorking::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
