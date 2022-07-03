<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\TimeWorkingController;
use App\Models\Category;
use App\Models\Resturant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {

    // admin routes
    Route::middleware('admin')->group(function () {
        Route::resource('/offer', OfferController::class);
        Route::resource('/category', CategoryController::class);
    });

    //seller routes
    Route::middleware('seller')->group(function () {
        Route::prefix('resturant/{resturant}/')->group(function () {
            Route::resource('food', FoodController::class);
            Route::resource('timeWorking', TimeWorkingController::class);
        });
        Route::get('/resturant/trash', [ResturantController::class, 'trashedIndex'])->name('resturant.trashed');
        Route::put('/resturant/{resturant}/restore', [ResturantController::class, 'restore'])->name('resturant.restore')->withTrashed();
        Route::delete('/resturant/{resturant}/forceDelete', [ResturantController::class, 'forceDelete'])->name('resturant.forceDelete')->withTrashed();
        Route::resource('/resturant', ResturantController::class);
    });

    //public
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')) {
            return view('Admin.dashboardAdmin');
        }
        return redirect()->route('resturant.index');
    })->name('dashboard');
});


require __DIR__.'/auth.php';
