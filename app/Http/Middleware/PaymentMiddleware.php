<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PaymentMiddleware
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
        if (!auth()->user()->hasPermissionTo('can buy')) {
            return response()->json([
                'msg' => 'You have not specified your address yet!'
            ]);
        }

        if ($request->route('cart')->is_pay) {
            return response()->json([
                'msg' => 'The cost of this shopping cart has already been paid.'
            ]);
        }
        return $next($request);
    }
}
