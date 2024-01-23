<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download(Request $request)
    {

        $orderIns = Order::where(['id' => $request->query('orderId')])->first();
        // dd($user->toArray());
        $order = $orderIns->toArray();
        $product = $orderIns->products;
        // dd($order, $product);


        $pdf = Pdf::loadView('user_pages.invoice', [
            'order' => $order,
            'product' => $product
        ]);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream();
        // return view('user_pages.invoice', [
        //     'order' => $order,
        //     'product' => $product
        // ]);

    }
}