<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Yajra\DataTables\Facades\DataTables;

class ViewOrder extends Component
{
    use WithPagination;

    public function render()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.content.view-order', [
            'orders' => $orders,
        ]);
    }


}