<form class="md:w-1/2" wire:submit.prevent="createProduct" novalidate>

    <!-- Nombre producto -->
    <div>
        <x-input-label for="nombre" :value="__('Nombre')" />
        <x-text-input
            id="nombre"
            class="block mt-1 w-full"
            type="text"
            wire:model="nombre"
            :value="old('nombre')"
            required
            autofocus
        />
        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
    </div>

    <!-- Descripción producto -->
    <div class="mt-4">
        <x-input-label for="descripcion" :value="__('Descripción')" />
        <x-text-input
            id="descripcion"
            class="block mt-1 w-full"
            type="text"
            wire:model="descripcion"
            :value="old('descripcion')"
            required
        />
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <!-- Categoria producto -->
    <div class="mt-4">
        <x-input-label for="category_id" :value="__('Categoría')" />
        <select
            wire:model="category_id"
            id="category_id"
            class="block mt-1 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >

            <option value="" hidden> -Seleccionar categoría- </option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
            @endforeach

        </select>
    </div>

    <!-- Marca producto -->
    <div class="mt-4">
        <x-input-label for="brand_id" :value="__('Marca')" />
        <select
            wire:model="brand_id"
            id="brand_id"
            class="block mt-1 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >

            <option value="" hidden> -Seleccionar marca- </option>

            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->nombre }}</option>
            @endforeach

        </select>
    </div>

    <!-- Precio producto -->
    <div class="mt-4">
        <x-input-label for="precio" :value="__('Precio')" />
        <x-text-input
            id="precio"
            class="block mt-1 w-full"
            type="text"
            wire:model="precio"
            :value="old('precio')"
            required
        />
        <x-input-error :messages="$errors->get('precio')" class="mt-2" />
    </div>

    <!-- Stock producto -->
    <div class="mt-4">
        <x-input-label for="stock" :value="__('Stock')" />
        <x-text-input
            id="stock"
            class="block mt-1 w-full"
            type="number"
            wire:model="stock"
            :value="old('stock')"
            required
        />
        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
    </div>

    <!-- Imagen producto -->
    <div class="mt-4">
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input
            id="imagen"
            class="block mt-1 w-full border dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm p-3"
            type="file"
            wire:model="imagen"
            accept="image/*"
            required
        />
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>

    @if ($imagen)
    <div class="my-5 flex justify-around bg-gray-900 rounded-lg p-5 border border-gray-700">
        <p class="text-sm text-white">
                Vista previa de la imagen:
        </p>
        <img src="{{ $imagen->temporaryUrl() }}" class="mt-2 rounded-lg border-gray-700" alt="Imagen" width="200" height="200" />
    </div>
    @endif


    <div class="flex items-center justify-end mt-10">
        <x-primary-button class="ml-4">
            {{ __('Añadir producto') }}
        </x-primary-button>
    </div>


</form>
