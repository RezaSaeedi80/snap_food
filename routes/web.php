<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ResturantController;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

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

//     $category = Category::find(5);

// App\Post::find(1)->categories()->save($category);
//     Category::find

    return view('welcome');
});

Route::resource('/category', CategoryController::class);
Route::resource('/resturant', ResturantController::class);
Route::resource('/offer', OfferController::class);

Route::get('/dashboard', function () {
    if (Gate::allows('admin')) {
        return view('Admin.dashboardAdmin');
    }
    $resturants = auth()->user()->load('resturants')->resturants->load('categories');
    return view('seller.dashboardSeller', compact('resturants'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
