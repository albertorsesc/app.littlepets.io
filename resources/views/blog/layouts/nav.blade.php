<nav class="bg-cyan-600 border-b border-cyan-300 border-opacity-25 lg:border-none" v-cloak>
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="relative h-16 flex items-center justify-between lg:border-b lg:border-cyan-400 lg:border-opacity-25">
            <div class="px-2 flex items-center lg:px-0">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}">
                        <img class="block h-auto w-40 lg:w-36" src="/logos/min_logo_little_pets_blanco.png" alt="LittlePets">
                    </a>
                </div>
                <div class="hidden lg:block lg:ml-10">
                    <div class="flex space-x-4">
                        <a href="{{ route('web.blog.index') }}" class="@if(request()->routeIs('web.blog.index')) bg-cyan-700 @endif text-white rounded-md py-2 px-3 text-sm font-medium" aria-current="page">
                            Inicio
                        </a>

                        @if(auth()->check() && auth()->user()->canEditBlog())
                        <!-- Profile dropdown -->
                        <a href="#"
                           @click="isAdminDropdownOpen = true"
                           class="@if(request()->segment(2) === 'editor') bg-cyan-700 @endif text-white hover:bg-cyan-500 hover:bg-opacity-75 rounded-md py-2 px-3 text-sm font-medium">
                            Admin
                        </a>
                        <div class="ml-3 relative flex-shrink-0">
                            <div v-show="isAdminDropdownOpen"
                                 class="fixed inset-0 transform transition-all"
                                 @click="isAdminDropdownOpen = false">
                                <div class="absolute inset-0 bg-transparent opacity-75"></div>
                            </div>

                            <transition name="dropdown" :duration="1500" appear>
                                <div v-show="isAdminDropdownOpen" class="origin-top-right absolute right-0 -ml-12 mt-10 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <a href="{{ route('web.blog.admin.articles.index') }}" class="hover:bg-gray-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                                        Artículos
                                    </a>
                                    @if(auth()->user()->isRoot())
                                        <a href="{{ route('web.blog.admin.categories.index') }}" class="hover:bg-gray-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                                            Categorias
                                        </a>
                                    @endif
                                </div>
                            </transition>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            {{--Search--}}
            <div class="hidden flex-1 px-2 flex justify-center lg:ml-6 lg:justify-end">
                <div class="max-w-lg w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative text-gray-400 focus-within:text-gray-600">
                        <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                            <!-- Heroicon name: solid/search -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="search" class="block w-full bg-white py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-cyan-600 focus:ring-white focus:border-white sm:text-sm" placeholder="Search" type="search" name="search">
                    </div>
                </div>
            </div>

            <div class="flex lg:hidden">
                <!-- Mobile menu button -->
                <button @click="isMenuOpen = ! isMenuOpen" type="button" class="bg-cyan-600 p-2 rounded-md inline-flex items-center justify-center text-cyan-200 hover:text-white hover:bg-cyan-500 hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-cyan-600 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="isMenuOpen ? 'hidden' : 'block'" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg :class="isMenuOpen ? 'block' : 'hidden'" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:block lg:ml-4">
                <div class="flex items-center">
<!--                    <button type="button" class="bg-cyan-600 flex-shrink-0 rounded-full p-1 text-cyan-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-cyan-600 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        &lt;!&ndash; Heroicon name: outline/bell &ndash;&gt;
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>-->
                    <!-- Profile dropdown desktop -->
                    <div class="ml-3 relative flex-shrink-0">
                        <div>
                            <button @click="isDropdownOpen = true" type="button" class="bg-cyan-600 rounded-full flex text-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-cyan-600 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="rounded-full h-8 w-8"
                                     src="{{ auth()->user()->getAvatar() }}"
                                     alt="">
                            </button>
                        </div>

                        <div v-show="isDropdownOpen"
                             class="fixed inset-0 transform transition-all"
                             @click="isDropdownOpen = false">
                            <div class="absolute inset-0 bg-transparent opacity-75"></div>
                        </div>

                        <transition name="dropdown" :duration="1500" appear>
                            <div v-show="isDropdownOpen" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                                    Mi Perfil
                                </a>
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
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <transition name="dropdown" :duration="1500" appear>
    <div class="lg:hidden" id="mobile-menu">
        <div v-show="isMenuOpen"
             class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('web.blog.index') }}" class="@if(request()->routeIs('web.blog.index')) bg-cyan-700 @endif text-white block rounded-md py-2 px-3 text-base font-medium" aria-current="page">
                Inicio
            </a>

            @if(auth()->check() && auth()->user()->canEditBlog())
                <a href="#" @click="isAdminDropdownOpen = true" class="text-white hover:bg-cyan-500 hover:bg-opacity-75 block rounded-md py-2 px-3 text-base font-medium">
                    Admin
                </a>
                <div class="ml-3 relative flex-shrink-0">
                    <div v-show="isAdminDropdownOpen"
                         class="fixed inset-0 transform transition-all"
                         @click="isAdminDropdownOpen = false">
                        <div class="absolute inset-0 bg-transparent opacity-75"></div>
                    </div>

                    <transition name="dropdown" :duration="1500" appear>
                        <div v-show="isAdminDropdownOpen" class="origin-top-left absolute -ml-3 left-0 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{ route('web.blog.admin.articles.index') }}" class="hover:bg-gray-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                                Artículos
                            </a>
                            <a href="{{ route('web.blog.admin.categories.index') }}" class="hover:bg-gray-100 block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                                Categorias
                            </a>
                        </div>
                    </transition>
                </div>
            @endif
        </div>
        @auth
            <transition name="dropdown" :duration="1500" appear>
            <div v-show="isMenuOpen" class="pt-4 pb-3 border-t border-cyan-700">
                <div class="px-5 flex items-center">
                    <div class="flex-shrink-0">
                        <img class="rounded-full h-10 w-10" src="{{ auth()->user()->getAvatar() }}" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-white">{{ auth()->user()->fullName() }}</div>
                        <div class="text-sm font-medium text-cyan-300">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="/user/profile" class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-cyan-500 hover:bg-opacity-75">
                        Mi Perfil
                    </a>
                    <form method="POST" action="{{ route('logout') }}" >
                        @csrf
                        <a href="#"
                           onclick="event.preventDefault();this.closest('form').submit();"
                           class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-cyan-500 hover:bg-opacity-75 hover:bg-gray-100 focus:bg-gray-100"
                           role="menuitem"
                           tabindex="-1"
                           id="user-menu-item-2">
                            Cerrar Sesión
                        </a>
                    </form>
                </div>
            </div>
            </transition>
        @endauth
    </div>
    </transition>
</nav>
