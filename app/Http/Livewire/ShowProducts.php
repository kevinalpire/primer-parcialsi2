<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ShowProducts extends Component
{
    public $term;
    public $category;
    public $brand;

    public $product;

    protected $listeners = ['deleteProduct', 'findProduct'];

    public function addToCart($id){
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

        $this->product = Product::find($id);

        ProductOrder::create([
            'product_id' => $id,
            'order_id' => $order->id,
            'cantidad' => 1,
            'subtotal' => $this->product->precio,
        ]);

        $order->total = $order->total + $this->product->precio;
        $order->save();

        $this->emit('showAlertCart');
    }

    public function findProduct($term, $category, $brand){
        $this->term = $term;
        $this->category = $category;
        $this->brand = $brand;
    }

    public function deleteProduct(Product $product){
        Storage::delete('public/products/'.$product->imagen);
        $product->delete();
    }

    public function render()
    {
        // $products = Product::paginate(18);
        $products = Product::when($this->term, function($query){
            $query->where(DB::raw('LOWER(nombre)'), 'LIKE', "%".strtolower($this->term)."%");
        })
        ->when($this->category, function($query){
            $query->where('category_id', $this->category);
        })
        ->when($this->brand, function($query){
            $query->where('brand_id', $this->brand);
        })
        ->paginate(18);

        return view('livewire.show-products',[
            'products' => $products
        ]);
    }
}
