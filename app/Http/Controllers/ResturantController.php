<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResturantRequest;
use App\Http\Requests\UpdateResturantRequest;
use App\Models\Category;
use App\Models\Resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResturantController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(Resturant::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resturants = auth()->user()->load('resturants')->resturants->load('categories');
        return view('seller.dashboardSeller', compact('resturants'));
    }

    /**
     * Display a listing of the resource trashed.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashedIndex()
    {
        $resturants = auth()->user()->resturants()->onlyTrashed()->get()->load('categories');
        return view('seller.Resturant.Trashed', compact('resturants'));
    }


    /**
     * restore a trashed resturant
     *
     * @return \Illuminate\Http\Response
     */

    public function restore(Resturant $resturant)
    {
        $resturant->restore();
        return back();
    }

    public function forceDelete(Resturant $resturant)
    {
        $resturant->forceDelete();
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', 'resturant')->get();
        return view('seller.Resturant.CreateResturant', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResturantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResturantRequest $request)
    {
        $category = Category::find($request->category);
        $resturant = Resturant::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
            'category' => $request->category,
            'phone' => $request->phone,
            'account_number' => $request->account_number,
        ]);
        $resturant->addresses()->create([
            'title' => $request->address_title,
            'address' => $request->address,
            'latitude' => $request->lat,
            'longitude' => $request->lng
        ]);
        $resturant->categories()->save($category);
        $resturant->image()->create([
            'path' => 'Default/default.jpg'
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant)
    {
        return view('seller.Resturant.ShowResturant', compact('resturant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function edit(Resturant $resturant)
    {
        $categories = Category::where('type', 'resturant')->get();
        return view('seller.Resturant.EditResturant', compact('resturant', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResturantRequest  $request
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResturantRequest $request, Resturant $resturant)
    {
        if ($resturant->image->path !== 'Default/default.jpg' && $request->file('image')) {
            unlink($resturant->image->path);
        }
        $path = $request->file('image')->store('public');
        $file_name = pathinfo($path, PATHINFO_BASENAME);

        $resturant->update([
            'name' => $request->name,
            'user_id' => auth()->id(),
            'category' => $request->category,
            'phone' => $request->phone,
            'account_number' => $request->account_number,
        ]);
        $resturant->addresses()->update([
            'title' => $request->address_title,
            'address' => $request->address,
            'latitude' => $request->lat,
            'longitude' => $request->lng
        ]);
        $resturant->categories()->update([
            'category_id' => $request->category
        ]);
        $resturant->image()->update([
            'path' => 'storage/' . $file_name
        ]);
        return redirect()->route('resturant.show', $resturant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resturant $resturant)
    {
        $resturant->delete();
        return redirect()->route('dashboard');
    }

    public function openResturant(Request $request, Resturant $resturant)
    {
        try {
            $result = $resturant->update([
                'is_open' => true
            ]);
            if ($result) {
                return response()->json([
                    'result' => true
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'result' => false,
            ]);
        }
    }

    public function closeResturant(Request $request, Resturant $resturant)
    {
        try {
            $result = $resturant->update([
                'is_open' => false
            ]);
            if ($result) {
                return response()->json([
                    'result' => true
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'result' => false,
            ]);
        }
    }
}
