<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $total = 0;
        $user = auth()->user();
        $items = \Cart::session('shopping-cart')->getContent();

        if ($user->userProfile == null) {
            return redirect('/profile');
        }

        if ($items->isEmpty()) {
            return redirect('/cart');
        }

        foreach ($items as $item) {
            $product = Product::find($item->id);
            $subTotal = $product->price * $item->quantity;
            $total = $total + $subTotal;
            $itemDetails[] = [
                'name' => $product->name,
                'quantity' => $item->quantity,
                'subTotal' => $subTotal,
            ];
        }
        // dd($itemDetails, $total);
        return view('user_pages.checkout', [
            'user' => $user,
            'items' => $itemDetails,
            'total' => $total
        ]);
    }


}