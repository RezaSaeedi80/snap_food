<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\TimeWorkingController;
use App\Models\Category;
use App\Models\Resturant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;

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

    Route::resource('/offer', OfferController::class)->middleware('can add offer');
    // admin routes
    Route::middleware('admin')->group(function () {
        Route::resource('/category', CategoryController::class);

        Route::get('permission/sellers', [PermissionController::class, 'sellers'])->name('permission.show');
        Route::post('permission/{user}/add', [PermissionController::class, 'addPermission'])->name('permission.add');
        Route::post('permission/{user}/revoke', [PermissionController::class, 'revokePermission'])->name('permission.revoke');
    });

    //seller routes
    Route::middleware('seller')->group(function () {
        Route::prefix('resturant/{resturant}/')->group(function () {
            Route::resource('food', FoodController::class);
            Route::resource('timeWorking', TimeWorkingController::class);
            Route::resource('payment', PaymentController::class);
        });
        Route::get('/resturant/trash', [ResturantController::class, 'trashedIndex'])->name('resturant.trashed');
        Route::put('/resturant/{resturant}/restore', [ResturantController::class, 'restore'])->name('resturant.restore')->withTrashed();
        Route::delete('/resturant/{resturant}/forceDelete', [ResturantController::class, 'forceDelete'])->name('resturant.forceDelete')->withTrashed();
        Route::resource('/resturant', ResturantController::class);
        Route::put('/resturant/{resturant}/open', [ResturantController::class, 'openResturant']);
        Route::put('/resturant/{resturant}/close', [ResturantController::class, 'closeResturant']);
    });

    //public
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')) {
            return view('Admin.dashboardAdmin');
        }
        return redirect()->route('resturant.index');
    })->name('dashboard');
});


require __DIR__ . '/auth.php';
