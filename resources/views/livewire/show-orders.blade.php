<div class="mt-8">

    <div class="bg-gray-800 rounded-lg">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="px-3 py-3 text-white">Fecha</th>
                    <th class="px-3 py-3 text-white">Total</th>
                    <th class="px-3 py-3 text-white">Estado</th>
                    <th class="px-3 py-3 text-white">Método de pago</th>
                    {{-- <th class="px-3 py-3 text-white">Opciones</th> --}}
                </tr>
            </thead>
            @foreach ($orders as $order)
            <tbody>
                  <tr class="border-t border-gray-200">
                    <td class="text-white px-6 py-4 text-center">{{$order->updated_at}}</td>
                    <td class="text-white px-6 py-4 text-center">{{$order->total}}</td>
                    <td class="text-white px-6 py-4 text-center">{{$order->status->nombre}}</td>
                    <td class="text-white px-6 py-4 text-center">{{$order->payment_method->nombre}}</td>
                    <td class="text-white px-6 py-4 text-center">
                        {{-- <button wire:click="delete({{$order->id}})" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg ">
                            Cancelar
                        </button>
                    </td> --}}
                  </tr>
            </tbody>
            @endforeach
        </table>
    </div>


    {{-- <div class="mt-8 flex justify-between">
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
    </div> --}}


</div>
