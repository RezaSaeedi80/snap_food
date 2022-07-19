<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class CartPaidMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $cart = Cart::findOrFail($request->cart_id);
        if (is_null($cart->payment)) {
            return response()->json([
                'msg' => 'This shopping cart has not been paid yet.'
            ], 403);
        }
        if ($cart->payment->status !== 'delivered') {
            return response()->json([
                'msg' => 'The payment process of this shopping cart has not been completed yet.',
            ], 403);
        }
        return $next($request);
    }
}
