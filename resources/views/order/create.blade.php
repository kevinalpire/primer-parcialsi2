<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Elije un método de pago!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (session()->has('message'))
                    <div class="p-3 text-green-500 dark:text-green-500 bg-green-950 border border-green-800 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    {{ __("Lista de métodos") }}
                </div>
            </div>
            <livewire:show-methods />

        </div>
    </div>
</x-app-layout>