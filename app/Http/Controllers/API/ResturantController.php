<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AllResturantResource;
use App\Http\Resources\ResturantResource;
use App\Models\Category;
use App\Models\Resturant;
use Illuminate\Http\Request;

class ResturantController extends Controller
{


    public function resturantInfo(Resturant $resturant)
    {
        return new ResturantResource($resturant);
    }


    public function resturants(Request $request)
    {
        try {
            $resturant = Resturant::query();
            if ($request->has('is_open')) {
                $is_open = ($request->is_open == 'true') ? 1 : 0;
                $resturant = $resturant->where('is_open', $is_open);
            }
            if ($request->has('type')) {

                $resturant = Resturant::all()
                                ->filter(fn($resturant) => $resturant->categories()->first()->name === $request->type);
            }
            if ($request->has('is_open') && $request->has('type')) {
                $is_open = ($request->is_open == 'true') ? 1 : 0;
                $resturant = Resturant::where('is_open', $is_open)->get()
                ->filter(fn($resturant) => $resturant->categories()->first()->name === $request->type);
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
