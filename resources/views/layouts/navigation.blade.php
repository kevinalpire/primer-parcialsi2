<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('product.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                </div>
                @auth
                @if (auth()->user()->role == 0)

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('product.create')" :active="request()->routeIs('product.create')">
                        {{ __('Nuevo producto') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('profile.index')" :active="request()->routeIs('profile.index')">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')">
                        {{ __('Categorias') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('brand.index')" :active="request()->routeIs('brand.index')">
                        {{ __('Marcas') }}
                    </x-nav-link>
                </div>

                @else
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('order.cart')" :active="request()->routeIs('order.cart')">
                        {{ __('Carrito de compras') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')">
                        {{ __('Mis pedidos') }}
                    </x-nav-link>
                </div>
                @endif
                @endauth

                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
                        {{ __('Wish list') }}
                    </x-nav-link>
                </div> --}}
            </div>

            @auth

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth

            @guest
            <div class="hidden sm:flex">
                <div class="text-end py-4 px-2 hover:underline bg">
                    <x-dropdown-link :href="route('login')">
                        {{ __('Iniciar sesión') }}
                    </x-dropdown-link>
                </div>
                <div class="text-end py-4 px-2 hover:underline bg">
                    <x-dropdown-link :href="route('register')">
                        {{ __('Registrarse') }}
                    </x-dropdown-link>
                </div>
            </div>
            @endguest

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>


    <!-- Responsive Navigation Menu, todo lo que comienza con x es componente. livewie es de live... --> 
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>

            @auth
            @if (auth()->user()->role == 0)

                <x-responsive-nav-link :href="route('product.create')" :active="request()->routeIs('product.create')">
                    {{ __('Nuevo producto') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.index')" :active="request()->routeIs('profile.index')">
                    {{ __('Gestión de usuarios') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')">
                    {{ __('Gestión de categorias') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('brand.index')" :active="request()->routeIs('brand.index')">
                    {{ __('Gestión de marcas') }}
                </x-responsive-nav-link>

                @else

                <x-responsive-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')">
                    {{ __('Carrito de compras') }}
                </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth
            @guest
                <div class="text-end py-4 px-2 hover:underline bg">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('login')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                            {{ __('Iniciar sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>

                <div class="text-end py-4 px-2 hover:underline bg">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('register')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                            {{ __('Registrarse') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endguest
            </div>


    </div>
</nav>
