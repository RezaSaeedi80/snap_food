<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\FoodsResource;
use App\Models\Category;
use App\Models\Resturant;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    public function index(Resturant $resturant)
    {
        $categories = Category::where('type', 'food')->with([
            'foods' => fn ($query) => $query->where('resturant_id', $resturant->id)
        ])->get();
        return [
            'categories' => CategoriesResource::collection($categories)
        ];
    }
}
