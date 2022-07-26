<?php

namespace App\Http\Controllers;

use App\Charts\FoodChart;
use App\Models\Category;
use App\Models\Food;
use App\Models\Resturant;
use Illuminate\Http\Request;

class ChartController extends Controller
{

    public function foods(Resturant $resturant)
    {
        return view('seller.Chart.ChartFood', compact('resturant'));
    }

    public function category(Resturant $resturant)
    {
        $categoryFood = Category::has('foods')->with([
            'foods' => fn($foods) => $foods->with('cartItems')->where('resturant_id', $resturant->id)
        ])->get()
        ->map(fn($category) => [$category->name, $category->foods->sum('count_item')])->toArray();

        $categoryName = [];
        $count = [];

        foreach ($categoryFood as $key => $value) {
            $categoryName[] = $value[0];
            $count[] = $value[1];
        }

        return view('seller.Chart.ChartCategory', compact('resturant'));
    }
}
