<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Category;
use App\Models\Food;
use App\Models\Offer;
use App\Models\Resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class cFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = auth()->user()->foods()->where('resturant_id', session('resturant')->id)->get()->load('categories');
        return view('seller.Food.ShowFoods', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resturants = auth()->user()->load('resturants')->resturants;
        $categories = Category::where('type', 'food')->get();
        return view('seller.Food.CreateFood', compact('categories', 'resturants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodRequest $request)
    {
        $category = Category::find($request->category);
        $food = Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'materials' => $request->materials,
            'resturant_id' => session('resturant')->id
        ]);
        $food->categories()->save($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        $categories = Category::where('type', 'food')->get();
        $offers = Offer::all();
        return view('seller.Food.FoodProfile', compact('food', 'categories', 'offers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodRequest  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $path = $request->file('image')->store('images', 's3');
        return $path;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
