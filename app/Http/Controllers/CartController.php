<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        // dd($productId);
        $product = Product::find($productId);

        if (!$product) {
            abort(404, 'Product not found');
        }

        $rowId = $product->id;
        $result = \Cart::session('shopping-cart')->add(
            array(
                'id' => $rowId,
                'name' => $product->name,
                'price' => $product->price,

                'associatedModel' => $product,
                'quantity' => 1,
            )
        );
        $isInCart = \Cart::session('shopping-cart')->get($productId) !== null;

        return response()->json(['is_in_cart' => $isInCart]);

    }
    public function seeCart()
    {
        // \Cart::session('shopping-cart')->clear();

        $user = auth()->user();
        $items = \Cart::session('shopping-cart')->getContent();

        $total = \Cart::getTotal('shopping-cart');


        return view("user_pages.cart", [
            'items' => $items,
            'user' => $user,
            'total' => $total
        ]);


    }
    public function updateCartButton(Request $request)
    {
        $productId = $request->input('product_id');
        $isInCart = \Cart::session('shopping-cart')->get($productId) !== null;

        return response()->json(['is_in_cart' => $isInCart]);

    }
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');



        // Remove the item from the cart
        \Cart::session('shopping-cart')->remove($productId);

        $total = \Cart::getTotal('shopping-cart');

        return response()->json(['success' => true, 'total' => $total]);
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Increase the quantity of the item in the cart
        \Cart::session('shopping-cart')->update($productId, [
            'quantity' => $quantity, // You can adjust this based on your requirements
        ]);

        $item = Cart::session('shopping-cart')->get($productId);


        $price = $item->get('price');
        $quantity = $item->get('quantity');

        $subTotal = $price * $quantity;


        $total = \Cart::getTotal('shopping-cart');
        return response()->json([
            'success' => true,
            'total' => $total,
            'subtotal' => $subTotal,
        ]);
    }


}