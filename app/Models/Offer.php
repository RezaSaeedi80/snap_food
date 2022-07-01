<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'persent', 'start', 'end'
    ];

    public function persent() : Attribute
    {
        return new Attribute(
            get: fn($persent) => ($persent === null) ? 0 : $persent
        );
    }
}
