<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Resources\OrderResource;
use App\Jobs\StatusJob;
use App\Models\Payment;
use App\Models\Resturant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\OpeningHours\OpeningHours;
use Rap2hpoutre\FastExcel\FastExcel;
use Stringable;

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
    public function index(Resturant $resturant, Request $request)
    {
        $orders = Payment::with('cart')
            ->whereNot('status', 'delivered')
            ->whereHas('cart', fn ($cart) => $cart->where('resturant_id', $resturant->id));

        if ($request->has('day')) {
            $orders = $orders->lastDay();
        }
        if ($request->has('week')) {
            $orders = $orders->lastWeek();
        }
        if ($request->has('month')) {
            $orders = $orders->lastMonth();
        }
        $orders = $orders->paginate(7);
        return view('seller.Order.Orders', compact('resturant', 'orders'));
    }

    public function orderSave(Resturant $resturant)
    {
        $orders = Payment::with('cart.user')
            ->whereNot('status', 'delivered')
            ->whereHas('cart', fn ($cart) => $cart->where('resturant_id', $resturant->id))->get()
            ->map(fn ($payment) => [
                'cart' => $payment->id,
                'user_name' => $payment->cart->user->name,
                'user_email' => $payment->cart->user->email,
                'user_address' => $payment->cart->user->addresses->first()->address,
                'status' => $payment->status,
                'price' => $payment->totalPrice,
                'date' => Carbon::parse($payment->created_at)->format('Y/m/d H:i:s'),
            ]);
        return (new FastExcel($orders))->download('orders.xlsx');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant, Payment $payment)
    {
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

    public function archives(Resturant $resturant, Request $request)
    {
        $orders = Payment::with('cart')
            ->where('status', 'delivered')
            ->whereHas('cart', fn ($cart) => $cart->where('resturant_id', $resturant->id));

        if ($request->has('day')) {
            $orders = $orders->lastDay();
        }
        if ($request->has('week')) {
            $orders = $orders->lastWeek();
        }
        if ($request->has('month')) {
            $orders = $orders->lastMonth();
        }
        $orders = $orders->paginate(7);

        return view('seller.Order.Archives', compact('resturant', 'orders'));
    }

    public function archiveSave(Resturant $resturant)
    {
        $archives = Payment::with('cart')
            ->where('status', 'delivered')
            ->whereHas('cart', fn ($cart) => $cart->where('resturant_id', $resturant->id))->get()
            ->map(fn ($payment) => [
                'cart' => $payment->id,
                'user_name' => $payment->cart->user->name,
                'user_email' => $payment->cart->user->email,
                'user_address' => $payment->cart->user->addresses->first()->address,
                'status' => $payment->status,
                'price' => $payment->totalPrice,
                'date' => Carbon::parse($payment->created_at)->format('Y/m/d H:i:s'),
            ]);
        return (new FastExcel($archives))->download('archives.xlsx');
    }

    public function archive(Resturant $resturant, Payment $payment)
    {
        $payment = $payment->load('cart.cartItems');
        return view('seller.Order.Archive', compact('resturant', 'payment'));
    }
}
