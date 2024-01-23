<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index(Request $request)
    {
        $productId = $request->query('id');
        $product = Product::where('id', $productId)->get();

        $user = auth()->user();
        return view("user_pages.single-product", [
            'user' => $user,
            'product' => $product
        ]);
    }
}