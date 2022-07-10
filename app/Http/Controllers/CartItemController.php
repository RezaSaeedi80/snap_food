<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Food;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartItemRequest $request)
    {
        try {
            $food = Food::find($request->food_id);
            $cart = Cart::where('resturant_id', $food->resturant_id)->first();
            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => auth()->id(),
                    'resturant_id' => $food->resturant_id,
                ]);
            }
            $cartItem = CartItem::where('cart_id', $cart->id)->where('food_id', $food->id)->first();
            if (!$cartItem) {
                $cartItem = CartItem::create([
                    'cart_id' => $cart->id,
                    'food_id' => $request->food_id,
                    'quantity' => $request->quantity
                ]);
            } else {
                $cartItem->update([
                    'quantity' => $cartItem->quantity + $request->quantity
                ]);
            }
        } catch (\Throwable $th) {
            return [
                'error' => 'this food not found'
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartItemRequest  $request
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem $cartItem)
    {
        //
    }
}
