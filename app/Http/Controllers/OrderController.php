<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Stripe\StripeClient;

use Cart;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{

    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }
    public function index()
    {


        // dd(env('STRIPE_SECRET_KEY'));
        // $stripe = new StripeClient($config);
        // dd($stripe);
        $lineItems = [];
        $total = 0;
        $user = auth()->user();
        $items = \Cart::session('shopping-cart')->getContent();
        // dd($stripe);

        foreach ($items as $item) {
            $product = Product::find($item->id);
            $subTotal = $product->price * $item->quantity;
            $total = $total + $subTotal;
            //For 
            $itemDetails[] = [
                'name' => $product->name,
                'quantity' => $item->quantity,
                'subTotal' => $subTotal,
            ];

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
        }
        // dd(PaymentStatus::getInstances());
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);


        $user = User::find($user->id);
        $order = $user->orders()->create([
            'total' => $total,
            'payment_status' => PaymentStatus::UNPAID,
            'session_id' => $session->id,
        ]);

        foreach ($itemDetails as $itemDetail) {
            $order->products()->create([
                'product_name' => $itemDetail['name'],
                'quantity' => $itemDetail['quantity'],
                'subTotal' => $itemDetail['subTotal'],
            ]);
        }
        \Cart::session('shopping-cart')->clear();

        return redirect($session->url);

    }

    public function success(Request $request)
    {
        // dd($request);
        $sessionId = $request->get('session_id');


        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                dd("Not Session");
                throw new NotFoundHttpException;
            }

            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                dd("Not Order");
                throw new NotFoundHttpException;
            }
            if ($order->payment_status === PaymentStatus::UNPAID) {
                $order->payment_status = PaymentStatus::PAID;
                $order->save();
            }

            return redirect('profile');
        } catch (\Exception $e) {
            throw new NotFoundHttpException;
        }

    }

    public function cancel()
    {
        dd("hi");
    }
}