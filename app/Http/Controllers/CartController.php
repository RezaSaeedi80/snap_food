<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CartController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(Cart::class, 'cart');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())->where('is_pay', false)->with([
            'resturant' => fn ($resturant) => $resturant->with('image'),
            'cartItems' => fn ($cartItems) => $cartItems->with('food')
        ])->get();
        return [
            'carts' => CartResource::collection($carts)
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return $cart;
    }

    public function payment(Cart $cart)
    {
        $this->authorize('payment', $cart);

        if ($cart->is_pay) {
            return response()->json([
                'msg' => 'The cost of this shopping cart has already been paid.'
            ]);
        }
        $finallPrice = $cart->with('cartItems')->first()->cartItems
            ->map(fn ($cartItem) => $cartItem->food->price_with_offer * $cartItem->quantity)
            ->sum();

        try {
            DB::beginTransaction();
            $cart->update([
                'is_pay' => true
            ]);
            $payment = Payment::create([
                'cart_id' => $cart->id,
                'status' => 'pending',
                'totalPrice' => $finallPrice,
            ]);
            DB::commit();
            if ($payment) {
                return response()->json([
                    'msg' => 'Payment was successful.'
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'msg' => 'Payment faild'
            ]);
        }
    }
}
