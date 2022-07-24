<?php

namespace App\Http\Middleware;

use App\Models\Food;
use Closure;
use Illuminate\Http\Request;

class ResturantIsOpenMiddleware
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
        $food = Food::findOrFail($request->food_id);
        if (!$food->resturant->is_open) {
            return response()->json([
                'msg' => 'The restaurant is currently closed.'
            ]);
        }
        if (!$food->resturant->time_working->isOpen()->isOpenAt(now())) {
            return response()->json([
                'msg' => 'The time of your request is outside the working hours of this restaurant.'
            ]);
        }
        return $next($request);
    }
}
