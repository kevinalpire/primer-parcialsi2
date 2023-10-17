<div>
    <div class="flex justify-around">
        <img src="{{asset('storage/products/'.$product->imagen)}}" alt="{{$product->nombre}}" class="rounded-lg w-1/3">


        <div class="flex flex-col justify-center w-1/2 bg-white dark:bg-gray-900 rounded-lg">
            <div class="p-2">
                <h1 class="text-3xl text-center font-bold p-2">{{__('Características')}}</h1>
                <p class="px-5">
                    <span class="font-bold">
                        Marca:
                    </span>
                    {{$product->brand->nombre}}
                </p>

                <p class="px-5">
                    <span class="font-bold">
                        Categoría:
                    </span>
                    {{$product->category->nombre}}
                </p>

                <p class="px-5">
                    <span class="font-bold">
                        Precio:
                    </span>
                    {{$product->precio}} Bs.
                </p>

                <p class="px-5">
                    <span class="font-bold">
                        Stock:
                    </span>
                    {{$product->precio}} Unidades.
                </p>

                <p class="px-5">
                    <span class="font-bold truncate">
                        Descripción:
                    </span>
                    {{$product->descripcion}}
                </p>
            </div>
            @auth
            @if (auth()->user()->role == 1)
            <div class="p-5">
                <form wire:submit.prevent="addToCart({{$product->id}})" class="flex">

                    <div class="w-1/2 mr-4" >
                        <x-input-label for="cantidad" :value="__('Cantidad:')" />
                        <x-text-input
                            id="cantidad"
                            type="number"
                            wire:model="cantidad"
                            :value=1
                            required
                        />
                    </div>

                    <button type="submit" class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full flex h-1/2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                          </svg> Agregar al carrito

                    </button>
                </form>
            </div>
            @endif
            @endauth

            {{-- //agradecimientos al compañero copilot --}}
            @guest
            <div class="p-5 flex justify-center">
                <a href="{{route('login')}}" class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full flex w-1/2">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                      </svg> Inicia sesión para comprar

                </a>
            @endguest
        </div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <script>
        Livewire.on('showAlert', () => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Añadido al carrito!',
                showConfirmButton: false,
                timer: 1500
            })
        })


    </script>
@endpush


    </div>
</div>
