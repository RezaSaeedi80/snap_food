<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FoodStoreMiddleware
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
        if ($request->route('resturant')->time_working === null) {
            return redirect()->back()->with('You must first specify your working hours');
        }
        return $next($request);
    }
}
