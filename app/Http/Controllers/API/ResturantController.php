<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResturantResource;
use App\Models\Resturant;
use Illuminate\Http\Request;

class ResturantController extends Controller
{


    public function resturantInfo(Resturant $resturant)
    {
        return new ResturantResource($resturant);
    }


    public function resturants()
    {

    }
}
