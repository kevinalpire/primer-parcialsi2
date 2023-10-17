<div class="bg-gray-100 dark:bg-gray-800 py-3 px-5 rounded-lg">
    <h2 class="text-2xl md:text-4xl text-white text-center font-extrabold my-5">{{__('Buscar productos')}}</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='readForm'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label 
                        class="block mb-1 text-sm text-white uppercase font-bold "
                        for="term">{{__('Busqueda por terminos')}}
                    </label>
                    <input 
                        id="term"
                        type="text"
                        placeholder="ej. blusa,poleras,short"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="term"
                    />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-white uppercase font-bold">{{__('Categorias')}}</label>
                    <select wire:model="category" class="border-gray-300 p-2 w-full rounded-md">
                        <option hidden>--Seleccione--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-white uppercase font-bold">{{__('Marca')}}</label>
                    <select wire:model="brand" class="border-gray-300 p-2 w-full rounded-md">
                        <option hidden>--Seleccione--</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{$brand->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input 
                    type="submit"
                    class="bg-blue-800 hover:bg-slate-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Buscar"
                />
            </div>
        </form>
    </div>
</div>