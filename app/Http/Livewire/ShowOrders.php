<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class ShowOrders extends Component
{
    public function render()
    {
        $orders = Order::where('cliente_id', auth()->user()->cliente->id)->paginate(18);
        return view('livewire.show-orders', [
            'orders' => $orders
        ]);
    }
}
