<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\OpeningHours\OpeningHours;


class Resturant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'user_id', 'phone', 'account_number', 'lng', 'lat', 'is_open'
    ];

    public function isOpen()
    {
        return OpeningHours::create([
            'monday'     => ($this->time_working->monday == '-') ? [] : [$this->time_working->monday],
            'tuesday'    => ($this->time_working->thusday == '-') ? [] : [$this->time_working->thusday],
            'wednesday'  => ($this->time_working->wednesday == '-') ? [] : [$this->time_working->wednesday],
            'thursday'   => ($this->time_working->thursday == '-') ? [] : [$this->time_working->thursday],
            'friday'     => ($this->time_working->friday == '-') ? [] : [$this->time_working->friday],
            'saturday'   => ($this->time_working->saturday == '-') ? [] : [$this->time_working->saturday],
            'sunday'     => ($this->time_working->sunday == '-') ? [] : [$this->time_working->sunday],
            'exceptions' => []
        ]);
    }

    public function distance($userAddress)
    {
        $address = $this->addresses()->first();
        $distance = (((intval($address->latitude) - intval($userAddress->lotitude)) ** 2) +
                    ((intval($address->longitude) - intval($userAddress->longitude)) ** 2)) ** 0.5;

        return $distance;
    }

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

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
