<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use App\Rules\OfferStartTime;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('Admin.Offer', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferRequest $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name|min:4|max:20',
            'persent' => 'required|integer|min:0|max:100',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => $validate->errors()
            ]);
        }

        Offer::create($request->all());
        return response()->json([
            'error' => '',
            'success' => 'Category added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name|min:4|max:20',
            'persent' => 'required|integer|min:0|max:100',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => $validate->errors()
            ]);
        }

        Offer::find($request->offer_id)->update($request->all());
        return response()->json([
            'error' => '',
            'success' => 'Service Updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return response()->json([
            'error' => '',
            'success' => 'Service deleted successfully'
        ]);
    }
}
