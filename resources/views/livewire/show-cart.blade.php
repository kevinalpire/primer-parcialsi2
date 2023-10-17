<div class="mt-8">
    
    <div class="bg-gray-800 rounded-lg">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="px-3 py-3 text-white">Producto</th>
                    <th class="px-3 py-3 text-white">Cantidad</th>
                    <th class="px-3 py-3 text-white">Precio Unitario</th>
                    <th class="px-3 py-3 text-white">Subtotal</th>
                    <th class="px-3 py-3 text-white">Opciones</th>
                </tr>
            </thead>
            @foreach ($product_orders as $product_order)
            <tbody>
                  <tr class="border-t border-gray-200">
                    <td class="text-white px-6 py-4 text-center">{{$product_order->product->nombre}}</td>
                    <td class="text-white px-6 py-4 text-center">{{$product_order->cantidad}}</td>
                    <td class="text-white px-6 py-4 text-center">{{$product_order->product->precio}} Bs.</td>
                    <td class="text-white px-6 py-4 text-center">{{$product_order->subtotal}} Bs.</td>
                    <td class="text-white px-6 py-4 text-center">
                        <button wire:click="delete({{$product_order->id}})" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg ">
                            Eliminar
                        </button>
                    </td>
                  </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="mt-8 flex justify-between">
        <div class="bg-gray-800 p-3 rounded-lg">
            <p>
                <span class="font-bold text-white">Total: </span>
                <span class="text-white">{{$total}} Bs.</span>  
            </p>
        </div>
    
        <div class="p-3">
            <button>
                <a href="{{route('order.create')}}" class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                    Realizar Pedido
                </a>
            </button>
        </div>
    </div>
          
        
</div>
