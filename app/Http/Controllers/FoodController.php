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

class FoodController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Food::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resturant $resturant)
    {
        if (auth()->id() !== $resturant->user_id) {
            abort(403);
        }
        $foods = $resturant->food()->get()->load('categories');
        return view('seller.Food.ShowFoods', compact('foods', 'resturant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Resturant $resturant)
    {
        if ($resturant->user_id !== auth()->id()) {
            abort(403);
        }
        $categories = Category::where('type', 'food')->get();
        return view('seller.Food.CreateFood', compact('categories', 'resturant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodRequest $request, Resturant $resturant)
    {
        $category = Category::find($request->category);
        $food = Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'materials' => $request->materials,
            'resturant_id' => $resturant->id
        ]);
        $food->categories()->save($category);
        $food->image()->create([
            'path' => 'Default/default.jpg'
        ]);
        return redirect()->route('food.index', $resturant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant, Food $food)
    {
        return view('seller.Food.FoodProfile', compact('food', 'resturant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Resturant $resturant, Food $food)
    {
        $offers = Offer::all();
        $categories = Category::where('type', 'food')->get();
        return view('seller.Food.editFood', compact('offers', 'categories', 'food', 'resturant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodRequest  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodRequest $request, Resturant $resturant, Food $food)
    {
        if ($food->image->path !== 'Default/default.jpg' && $request->file('image')) {
            unlink($food->image->path);
        }
        $path = $request->file('image')->store('public');
        $file_name = pathinfo($path, PATHINFO_BASENAME);

        $food->update([
            'name' => $request->name,
            'price' => $request->price,
            'resturant_id' => $resturant->id,
            'materials' => $request->materials,
            'offer_id' => $request->offer
        ]);
        $food->categories()->update([
                'category_id' => $request->category
        ]);
        $food->image()->update([
            'path' => 'storage/' . $file_name
        ]);
        return redirect()->route('food.index', $resturant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resturant $resturant, Food $food)
    {
        $food->delete();
        return back();
    }
}
