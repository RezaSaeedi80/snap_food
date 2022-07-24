<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\OpeningHours\OpeningHours;

class TimeWorking extends Model
{
    use HasFactory;

    protected $fillable = [
        'saturday',
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'resturant_id'
    ];


    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }

    public function isOpen()
    {
        return OpeningHours::create([
            'monday'     => ($this->monday == '-') ? [] : [$this->monday],
            'tuesday'    => ($this->tuesday == '-') ? [] : [$this->tuesday],
            'wednesday'  => ($this->wednesday == '-') ? [] : [$this->wednesday],
            'thursday'   => ($this->thursday == '-') ? [] : [$this->thursday],
            'friday'     => ($this->friday == '-') ? [] : [$this->friday],
            'saturday'   => ($this->saturday == '-') ? [] : [$this->saturday],
            'sunday'     => ($this->sunday == '-') ? [] : [$this->sunday],
            'exceptions' => []
        ]);
    }
}
