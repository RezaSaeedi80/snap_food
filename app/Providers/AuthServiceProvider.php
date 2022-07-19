<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Payment;
use App\Models\Resturant;
use App\Models\TimeWorking;
use App\Models\User;
use App\Policies\CartItemPolicy;
use App\Policies\CartPolicy;
use App\Policies\CommentPolicy;
use App\Policies\FoodPolicy;
use App\Policies\PaymentPolicy;
use App\Policies\ResturantPolicy;
use App\Policies\TimeWorkingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Food::class => FoodPolicy::class,
        TimeWorking::class => TimeWorkingPolicy::class,
        Resturant::class => ResturantPolicy::class,
        CartItem::class => CartItemPolicy::class,
        Cart::class => CartPolicy::class,
        Payment::class => PaymentPolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
