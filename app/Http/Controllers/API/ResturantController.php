<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResturantSearchRequest;
use App\Http\Resources\AllResturantResource;
use App\Http\Resources\ResturantResource;
use App\Models\Address;
use App\Models\Category;
use App\Models\Resturant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\User;

class ResturantController extends Controller
{


    public function resturantInfo(Resturant $resturant)
    {
        return new ResturantResource($resturant);
    }


    public function resturants(ResturantSearchRequest $request)
    {
        $lat = auth()->user()->addresses()->where('current_address', true)->first()->latitude;
        $lon = auth()->user()->addresses()->where('current_address', true)->first()->longitude;

        try {
            $resturant = Resturant::near($lat, $lon);
            if ($request->has('is_open')) {
                if ($request->is_open == true) {
                    $resturant = $resturant->open();
                }
                if ($request->is_open == false) {
                    $resturant = $resturant->close();
                }
            }
            if ($request->has('type')) {
                $resturant = $resturant->whereHas(
                    'categories',
                    fn ($category) => $category->where('name', $request->type)
                );
            }
            $resturant = $resturant->get();
            return response()->json([
                'data' => AllResturantResource::collection($resturant),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage()
            ]);
        }
    }
}
