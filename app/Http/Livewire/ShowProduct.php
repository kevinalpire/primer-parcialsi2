<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use App\Models\ProductOrder;

class ShowProduct extends Component
{
    public $product, $cantidad = 1;

    // protected $listeners = ['addToCart'];

    public function addToCart($id)
    {
        if(!auth()->user()->cliente->cantOrders() > 0){
            $order = Order::create([
                'cliente_id' => auth()->user()->cliente->id,
                'payment_method_id' => 1,
                'status_id' => 1,
            ]);
        }else{
            if(auth()->user()->cliente->cart()){
                $order = auth()->user()->cliente->cart();
            }else{
                $order = Order::create([
                    'cliente_id' => auth()->user()->cliente->id,
                    'payment_method_id' => 1,
                    'status_id' => 1,
                ]);
            }
        }

        $productorder = ProductOrder::create([
            'product_id' => $id,
            'order_id' => $order->id,
            'cantidad' => $this->cantidad,
            'subtotal' => $this->product->precio * $this->cantidad,
        ]);

        $order->total = $order->total + $productorder->subtotal;
        $order->save();

        $this->emit('showAlert');
    }

    public function render()
    {
        return view('livewire.show-product');
    }
}
