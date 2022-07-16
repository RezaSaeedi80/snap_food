<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Jobs\StatusJob;
use App\Models\Payment;
use App\Models\Resturant;
use Illuminate\Http\Request;
use Spatie\OpeningHours\OpeningHours;


class PaymentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Payment::class, 'payment');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resturant $resturant)
    {
        if (auth()->id() !== $resturant->user_id) {
            abort(403);
        }
        $orders = Payment::with('cart')
            ->whereNot('status', 'delivered')
            ->whereHas('cart', fn ($cart) => $cart->where('resturant_id', $resturant->id))->get();
        return view('seller.Order.Orders', compact('resturant', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant, Payment $payment)
    {
        // dd(auth()->user()->unreadNotifications);
        $payment = $payment->load('cart.cartItems');
        return view('seller.Order.Order', compact('resturant', 'payment'));
    }

    public function status(Resturant $resturant, Payment $payment)
    {
        $this->authorize('status', $payment);
        try {
            if ($payment->status !== 'delivered') {
                $payment->status = Payment::STATUS[array_search($payment->status, Payment::STATUS) + 1];
                $payment->save();
                StatusJob::dispatch($payment)->delay(now()->addMinute(1));
                return redirect()->back()->with('status updated successfully');
            }
            return redirect()->back()->with('This order has been sent and you cannot change its status.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status updated faild');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
