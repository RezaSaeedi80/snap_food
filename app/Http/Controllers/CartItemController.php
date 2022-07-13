<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Food;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(CartItem::class, 'cartItem');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartItemRequest $request)
    {
        DB::transaction(function () use ($request) {
            $food = Food::findOrFail($request->food_id);
            $cart = Cart::where('resturant_id', $food->resturant_id)
                ->where('user_id', auth()->id())
                ->where('is_pay', false)
                ->first();
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
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function show(CartItem $cartItem)
    {
        return $cartItem->load('food');
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
        $result = $cartItem->update([
            'quantity' => $request->quantity
        ]);
        if ($result) {
            return response()->json([
                'msg' => 'updated successfully',
            ]);
        }
        return response()->json(['msg' => 'error'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem $cartItem)
    {
        try {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            }else {
                $cartItem->delete();
            }
            return response()->json([
                'msg' => 'The desired item was successfully removed from the shopping cart.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => 'server faild'
            ], 500);
        }
    }
}
