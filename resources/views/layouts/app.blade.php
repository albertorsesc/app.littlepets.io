<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/logos/favicon.png">
    <meta property="canonical" content="{{ url()->current() }}">

    <title>@yield('title') | {{ config('app.name') }} | Haciendo todo lo posible por encontrarle hogar a cada angelito perdido.</title>

    @yield('meta')

    <script>
        window.me = @json(auth()->check() ? ['loggedIn' => auth()->check() ?? false, 'i' => auth()->id()] : false)
    </script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield('styles')

    @livewireStyles

</head>
<body class="font-sans antialiased min-w-full bg-gray-100">

{{--Banner--}}
<div class="bg-cyan-100">
    <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
                    <span class="flex p-2 rounded-lg bg-cyan-600">
                        <i class="fas fa-code-branch text-white"></i>
                    </span>
                <p class="ml-3 font-semibold text-cyan-700 truncate">
                          <span class="sm:hidden">
                            ¡Nuestra versión Beta esta al aire!
                          </span>
                          <span class="hidden sm:block lg:hidden">
                            ¡Nuestra versión Beta está al aire, espera nuevas funcionalidades!
                          </span>
                    <span class="hidden md:inline">
                        Nos encontramos en nuestra versión Beta, Lo que significa que estaremos añadiendo secciones y
                        funcionalidades para apoyar estas causas. Muchas Gracias!
                      </span>
                </p>
            </div>
            <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                {{--<a href="https://app.littlepets.io/register" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-cyan-600 bg-white hover:bg-cyan-50">
                    Registrate
                </a>--}}
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                <button type="button" class="bg-transparent -mr-1 flex p-2 focus:outline-none sm:-mr-2">
                    {{--<span class="sr-only">Dismiss</span>
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>--}}
                </button>
            </div>
        </div>
    </div>
</div>

{{--@stack('modals')--}}
@livewireScripts

<div id="app" class="min-h-screen w-full">

    <App inline-template>
        <div
            class="min-h-screen min-w-full flex overflow-hidden"
            v-cloak>

            @include('layouts.sidebar')

            <div class="w-full mx-auto flex-1 overflow-auto focus:outline-none">

                {{--Header--}}
                <div class="relative flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none"> {{--z-10--}}
                    {{--Mobile open sidebar--}}
                    <button @click="isMenuOpen = ! isMenuOpen" class="px-4 border-r border-gray-200 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500 lg:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <!-- Heroicon name: outline/menu-alt-1 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </button>

                    <div class="flex-1 px-4 flex justify-between sm:px-6 lg:mx-auto lg:px-8 bg-white">
                        <!-- Search bar -->
                        <div class="flex-1 flex">
                            <form class="w-full flex md:ml-0" action="#" method="GET">
                                {{--<label for="search_field" class="sr-only">Search</label>
                                <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none" aria-hidden="true">
                                        <!-- Heroicon name: solid/search -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="search_field" name="search_field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Buscar en adopciones, perdidos y encontrados, veterinarias..." type="search">
                                </div>--}}
                            </form>
                        </div>

                        <div class="ml-4 flex items-center md:ml-6">
                            {{--Notifications--}}
                            {{--<button class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>--}}

                            <!-- Profile dropdown -->
                            <div class="ml-3 relative">
                                <div>
                                    <button @click="isDropdownOpen = true" type="button" class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-50" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <img class="h-8 w-8 rounded-full"
                                             src="{{ auth()->user()->getAvatar() }}" alt="">
                                        <span class="hidden ml-3 text-gray-700 text-sm font-medium lg:block">
                                            <span class="sr-only">Open user menu for </span>
                                                {{ auth()->user()->first_name }}
                                            </span>
                                        <!-- Heroicon name: solid/chevron-down -->
                                        <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div v-show="isDropdownOpen"
                                     class="fixed inset-0 transform transition-all"
                                     @click="isDropdownOpen = false">
                                    <div class="absolute inset-0 bg-transparent opacity-75"></div>
                                </div>

                                <transition name="dropdown" :duration="1500" appear>
                                    <div v-show="isDropdownOpen"
                                         class="origin-top-right absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none transform transition-all"
                                         role="menu"
                                         aria-orientation="vertical"
                                         aria-labelledby="user-menu-button"
                                         tabindex="-1">
                                        <a href="/user/profile"
                                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                           role="menuitem"
                                           tabindex="-1"
                                           id="user-menu-item-0">
                                            Mi Perfil
                                        </a>
                                        {{--<a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                           role="menuitem"
                                           tabindex="-1"
                                           id="user-menu-item-1">
                                            Settings
                                        </a>--}}
                                        <form method="POST" action="{{ route('logout') }}" >
                                            @csrf
                                            <a href="#"
                                               onclick="event.preventDefault();this.closest('form').submit();"
                                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                               role="menuitem"
                                               tabindex="-1"
                                               id="user-menu-item-2">
                                                Cerrar Sesión
                                            </a>
                                        </form>
                                    </div>
                                </transition>
                            </div>
                        </div>
                    </div>
                </div>

                <main class="flex-1 pb-8 overflow-y-auto"> {{--z-0 relative--}}

                    @yield('content')

                </main>

            </div>
        </div>
    </App>

</div>

{{--<script src="https://cdn.jsdelivr.net/gh/livewire/vue@v0.3.x/dist/livewire-vue.js"></script>--}}
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
@yield('scripts')

</body>
</html>
