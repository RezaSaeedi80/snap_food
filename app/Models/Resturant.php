<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\OpeningHours\OpeningHours;


class Resturant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'user_id', 'phone', 'account_number', 'lng', 'lat', 'is_open'
    ];

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

    public function scopeOpen($query)
    {
        $query->where('is_open', true)->whereHas(
            'time_working',
            fn ($timeWorking) => $timeWorking
                ->whereRaw(DB::raw("TIMESTAMP(STR_TO_DATE(substring_index(" . strtolower(Carbon::now()->format('l')) . " , '-', 1), '%H:%i')) < '" . Carbon::now() . "'"))
                ->whereRaw(DB::raw("TIMESTAMP(STR_TO_DATE(substring_index(" . strtolower(Carbon::now()->format('l')) . " , '-', -1), '%H:%i')) > '" . Carbon::now() . "'"))
        );
    }

    public function scopeClose($query)
    {
        $query->where('is_open', false)->orWhereHas(
            'time_working',
            fn ($timeWorking) => $timeWorking
                ->whereRaw(DB::raw("NOT TIMESTAMP(STR_TO_DATE(substring_index(" . strtolower(Carbon::now()->format('l')) . " , '-', 1), '%H:%i')) < '" . Carbon::now() . "'"))
                ->orWhereRaw(DB::raw("NOT TIMESTAMP(STR_TO_DATE(substring_index(" . strtolower(Carbon::now()->format('l')) . " , '-', -1), '%H:%i')) > '" . Carbon::now() . "'"))
        )->get();
    }

    public function scopeNear($query, $lat, $lon)
    {
        $query->whereHas(
            'addresses',
            fn ($addresse) => $addresse->whereRaw(DB::raw("6371 * acos(cos(radians(" . $lat . "))
            * cos(radians(latitude))
            * cos(radians(longitude) - radians(" . $lon . "))
            + sin(radians(" . $lat . "))
            * sin(radians(latitude))) < 5"))
        )->with([
            'addresses' => fn ($addersses) => $addersses->select("*", DB::raw("6371 * acos(cos(radians(" . $lat . "))
            * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $lon . "))
            + sin(radians(" . $lat . ")) * sin(radians(latitude))) AS distance"))->orderBy('distance')
        ]);
    }
}
