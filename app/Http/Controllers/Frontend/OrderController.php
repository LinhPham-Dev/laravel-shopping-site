<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Models\PaymentMethod;
use App\Models\ShippingUnit;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }

    public function showCheckoutForm()
    {
        $payment_methods = PaymentMethod::all();
        $shipping_units = ShippingUnit::all();

        return view('frontend.pages.checkout', compact('payment_methods', 'shipping_units'));
    }

    public function checkout(Request $request)
    {

        $order = Order::addOrder($request);

        if ($order) {
            OrderDetail::addOrderDetail($order->id);

            // new Order
            $new_order = Order::findOrFail($order->id);

            // Send mail.
            Mail::to($request->user())->send(new OrderConfirmation($new_order));

            return redirect()->route('order.check');
        }
    }

    public function check()
    {
        return view('frontend.pages.order_check');
    }

    public function confirmed($token)
    {

        $order = Order::where('token', $token)->first();

        if ($order) {
            $order->update(['confirm' => date('Y-m-d H:i:s'), 'token' => '']);

            // Redirect route success.
            return redirect()->route('order.complete', ['order_id' => $order->id]);
        } else {
            return redirect()->route('order.failed');
        }
    }

    public function complete(Request $request)
    {
        $new_order = Order::findOrFail($request->order_id);

        return view('frontend.pages.order_complete', compact('new_order'));
    }

    public function failed()
    {
        return view('frontend.pages.order_failed');
    }

    public function orderHistory()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate(5);

        return view('frontend.pages.order_history', compact('orders'));
    }
}
