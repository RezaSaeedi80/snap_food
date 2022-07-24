<?php

use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\SellerCommentController;
use App\Http\Controllers\TimeWorkingController;
use App\Models\Category;
use App\Models\Food;
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

        //permission
        Route::get('permission/sellers', [PermissionController::class, 'sellers'])->name('permission.show');
        Route::post('permission/{user}/add', [PermissionController::class, 'addPermission'])->name('permission.add');
        Route::post('permission/{user}/revoke', [PermissionController::class, 'revokePermission'])->name('permission.revoke');

        //comments
        Route::prefix('admin/')->as('admin.')->group(function () {
            Route::get('rejectedComments/', [AdminCommentController::class, 'index'])->name('comment.index');
            Route::put('{comment}/approve', [AdminCommentController::class, 'approve'])->name('comment.approve');
            Route::delete('{comment}/destroy', [AdminCommentController::class, 'destroy'])->name('comment.destroy');
        });

    });

    //seller routes
    Route::middleware('seller')->group(function () {
        Route::middleware('resturant_seller')->prefix('resturant/{resturant}/')->group(function () {
            Route::resource('food', FoodController::class);
            Route::resource('timeWorking', TimeWorkingController::class);

            //payment
            Route::get('payment/archives', [PaymentController::class, 'archives'])->name('payment.archives');
            Route::get('payment/{payment}/archive', [PaymentController::class, 'archive'])->name('payment.archives.show');
            Route::resource('payment', PaymentController::class)->only([
                'show', 'index'
            ]);
            Route::put('payment/{payment}/status', [PaymentController::class, 'status'])->name('payment.status');

            //comment
            Route::as('seller.')->group(function () {
                Route::get('comments/notApproved/', [SellerCommentController::class, 'notApprovedComment'])->name('comments.notApproved');
                Route::put('comments/{comment}/approve', [SellerCommentController::class, 'approve'])->name('comments.approve');
                Route::put('comments/{comment}/reject', [SellerCommentController::class, 'reject'])->name('comments.reject');
                Route::resource('comments', SellerCommentController::class);
            });
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
