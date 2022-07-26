<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Food;
use App\Models\Resturant;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class FoodChart extends BaseChart
{

    public function __construct()
    {
    }

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $resturant = Resturant::findOrfail($request->id);
        $food = Food::with('cartItems')->where('resturant_id', $resturant->id)->has('cartItems');

        $foodName = $food->get()->pluck('name')->toArray();
        $foodCount = $food->get()
            ->map(fn ($food) => $food->cartItems->sum('quantity'))->toArray();

        return Chartisan::build()
            ->labels($foodName)
            ->dataset('Food', $foodCount);
        // ->dataset('Sample 2', [3, 2, 1]);
    }
}
