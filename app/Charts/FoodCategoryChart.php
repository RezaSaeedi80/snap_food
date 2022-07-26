<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Category;
use App\Models\Resturant;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class FoodCategoryChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $resturant = Resturant::findOrFail($request->id);
        $categoryFood = Category::has('foods')->with([
            'foods' => fn ($foods) => $foods->with('cartItems')->where('resturant_id', $resturant->id)
        ])->get()
            ->map(fn ($category) => [$category->name, $category->foods->sum('count_item')])->toArray();

        $categoryName = [];
        $count = [];

        foreach ($categoryFood as $key => $value) {
            $categoryName[] = $value[0];
            $count[] = $value[1];
        }

        return Chartisan::build()
            ->labels($categoryName)
            ->dataset('category', $count);
    }
}
