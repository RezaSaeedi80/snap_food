<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeWorking extends Model
{
    use HasFactory;

    protected $fillable = [
        'saturday',
        'sunday',
        'monday',
        'thusday',
        'wednesday',
        'thursday',
        'friday',
        'resturant_id'
    ];


    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }
}
