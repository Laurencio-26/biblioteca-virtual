<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('libros.index')" :active="request()->routeIs('libros.*')">
                        {{ __('Libros') }}
                    </x-nav-link>
                    <x-nav-link :href="route('prestamos.index')" :active="request()->routeIs('prestamos.*')">
                        {{ __('Préstamos') }}
                    </x-nav-link>
                     <x-nav-link :href="route('solicitudes.index')" :active="request()->routeIs('solicitudes.*')">
                        {{ __('solicitudes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.*')">
                        {{ __('Categorías') }}
                    </x-nav-link>
                    <x-nav-link :href="route('reportes.index')" :active="request()->routeIs('reportes.*')">
                        {{ __('Reportes') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side of Navbar -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @guest
                    <!-- Botones para invitados -->
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 px-3">
                        {{ __('Iniciar sesión') }}
                    </a>
                    <a href="{{ route('register') }}" class="ml-4 text-gray-700 hover:text-indigo-600 px-3">
                        {{ __('Registrarse') }}
                    </a>
                @endguest

                @auth
                    <!-- Dropdown usuario -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none">
                                @if (Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                         class="h-8 w-8 rounded-full object-cover"
                                         alt="Avatar">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff&size=80"
                                         class="h-8 w-8 rounded-full object-cover"
                                         alt="Avatar default">
                                @endif
                                <span class="ml-2">{{ Auth::user()->name }}</span>
                                <svg class="ml-1 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 
                               hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 
                               transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('libros.index')" :active="request()->routeIs('libros.*')">
                {{ __('Libros') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('prestamos.index')" :active="request()->routeIs('prestamos.*')">
                {{ __('Préstamos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.*')">
                {{ __('Categorías') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('reportes.index')" :active="request()->routeIs('reportes.*')">
                {{ __('Reportes') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="px-4">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Iniciar sesión') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">
                        {{ __('Registrarse') }}
                    </x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
