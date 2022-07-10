<?php

use App\Http\Controllers\API\AddressUserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\ResturantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    // Addresses
    Route::apiResource('address', AddressUserController::class);
    Route::put('address/{address}/currentAddress', [AddressUserController::class, 'setCurrentAddress']);
    // restuarants
    Route::get('resturants/{resturant}/foods', [FoodController::class, 'index']);
    Route::get('resturants/{resturant}', [ResturantController::class, 'resturantInfo']);
    Route::get('resturants/', [ResturantController::class, 'resturants']);

    //cart
    Route::apiResource('carts', CartController::class);

    //cart_item
    Route::apiResource('cartItems', CartItemController::class);

    // logout
    Route::get('logout', [AuthController::class, 'logout']);
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


