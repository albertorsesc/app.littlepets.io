<!-- Mobile side menu -->
<div v-show="isMenuOpen" class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
    <transition name="menu-overlay" :duration="1500" appear>
        <div @click="isMenuOpen = false"
             v-show="isMenuOpen"
             class="fixed inset-0 bg-gray-600 bg-opacity-75 transform transition-all"
             aria-hidden="true"
        ></div>
    </transition>

    <transition name="menu-off-canvas" :duration="1500" appear>
        <div v-show="isMenuOpen" class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-cyan-700 transform transition-all">
            <transition name="menu-close-btn" :duration="1500" appear>
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button @click="isMenuOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </transition>

            <div class="flex-shrink-0 flex items-center px-4">
                <img class="h-32 w-auto" src="/logos/min_logo_little_pets_blanco.png" alt="LittlePets.io">
            </div>
            <nav class="mt-5 flex-shrink-0 h-full divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                <div class="px-2 space-y-1">
                    <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:text-white hover:bg-cyan-600" -->
                    <a href="{{ route('home') }}"
                       class="@if(request()->routeIs('home') || request()->segment(1) === 'inicio') bg-cyan-800 @endif text-white group flex items-center px-2 py-2 text-base font-medium rounded-md" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 flex-shrink-0 text-cyan-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Inicio
                    </a>
                    <a href="{{ route('web.adoptions.index') }}"
                       class="@if(request()->routeIs('web.adoptions.index') || request()->segment(1) === 'adopciones') bg-cyan-800 @endif text-white group flex items-center px-2 py-2 text-base font-medium rounded-md" aria-current="page">
                        <i class="fas fa-paw mr-4 flex-shrink-0 text-cyan-200"></i>
                        Adopciones
                    </a>
                    <a href="{{ route('web.lost-pets.index') }}"
                       class="@if(request()->routeIs('web.lost-pets.index') || request()->segment(1) === 'perdidos-y-encontrados')) bg-cyan-800 @endif text-white group flex items-center px-2 py-2 text-base font-medium rounded-md" aria-current="page">
                        <i class="fas fa-bullhorn mr-4 flex-shrink-0 text-cyan-200"></i>
                        Perdidos y Encontrados
                    </a>
                    <a href="{{ route('web.veterinaries.index') }}"
                       class="@if(request()->routeIs('web.veterinaries.index') || request()->segment(1) === 'veterinarias')) bg-cyan-800 @endif text-white group flex items-center px-2 py-2 text-base font-medium rounded-md" aria-current="page">
                        <i class="fas fa-clinic-medical mr-4 flex-shrink-0 text-cyan-200"></i>
                        Veterinarias
                    </a>
                </div>
                {{--<div class="mt-6 pt-6">
                    <div class="px-2 space-y-1">
                        <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                            <!-- Heroicon name: outline/cog -->
                            <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Settings
                        </a>

                        <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                            <!-- Heroicon name: outline/question-mark-circle -->
                            <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Help
                        </a>

                        <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                            <!-- Heroicon name: outline/shield-check -->
                            <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Privacy
                        </a>
                    </div>
                </div>--}}
            </nav>
        </div>
    </transition>

    <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
</div>

<!-- Desktop Sidebar -->
<div class="hidden lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-64">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col flex-grow bg-cyan-600 pt-5 pb-4 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 px-4">
                <img class="h-full w-auto" src="/logos/min_logo_little_pets_blanco.png" alt="LittlePets.io logo">
            </div>
            <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                <div class="px-2 space-y-1">
                    <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:text-white hover:bg-cyan-600" -->
                    {{--<a href="#" class="text-white group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" aria-current="page">
                        <!-- Heroicon name: outline/home -->
                        <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Inicio
                    </a>--}}

                    <a href="{{ route('home') }}"
                       class="@if(request()->routeIs('home') || request()->segment(1) === 'inicio')) bg-cyan-800 @endif text-white hover:text-white hover:font-semibold hover:bg-cyan-800 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 flex-shrink-0 text-cyan-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Inicio
                    </a>

                    <a href="{{ route('web.adoptions.index') }}"
                       class="@if(request()->routeIs('web.adoptions.index') || request()->segment(1) === 'adopciones')) bg-cyan-800 @endif text-white hover:text-white hover:font-semibold hover:bg-cyan-800 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md">
                        <i class="fas fa-paw mr-4 flex-shrink-0 text-cyan-200"></i>
                        Adopciones
                    </a>

                    <a href="{{ route('web.lost-pets.index') }}"
                       class="@if(request()->routeIs('web.lost-pets.index') || request()->segment(1) === 'perdidos-y-encontrados')) bg-cyan-800 @endif text-white hover:text-white hover:bg-cyan-800 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md">
                        <i class="fas fa-bullhorn mr-4 flex-shrink-0 text-cyan-200"></i>
                        Perdidos y Encontrados
                    </a>

                    <a href="{{ route('web.veterinaries.index') }}"
                       class="@if(request()->routeIs('web.veterinaries.index') || request()->segment(1) === 'veterinarias') bg-cyan-800 @endif text-white hover:text-white hover:bg-cyan-800 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md">
                        <i class="fas fa-clinic-medical mr-4 flex-shrink-0 text-cyan-200"></i>
                        Veterinarias
                    </a>

                    {{--<a href="#"
                       class="text-white hover:text-white hover:bg-cyan-800 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md">
                        <i class="fas fa-university mr-4 flex-shrink-0 text-cyan-200"></i>
                        Organizaciones
                    </a>

                    <a href="#"
                       class="text-white hover:text-white hover:bg-cyan-800 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md">
                        <i class="fas fa-hand-holding-heart mr-4 flex-shrink-0 text-cyan-200"></i>
                        Donaciones
                    </a>

                    <a href="#"
                       class="text-white hover:text-white hover:bg-cyan-800 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md">
                        <i class="fas fa-cut mr-4 flex-shrink-0 text-cyan-200"></i>
                        Estéticas de Mascotas
                    </a>

                    <a href="#"
                       class="text-white hover:text-white hover:bg-cyan-800 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md">
                        <i class="fas fa-dumbbell mr-4 flex-shrink-0 text-cyan-200"></i>
                        Entrenadores
                    </a>--}}

                    {{--<a href="#" class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                        <!-- Heroicon name: outline/scale -->
                        <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                        Perdidos y Encontrados
                    </a>--}}

                    {{--<a href="#" class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                        <!-- Heroicon name: outline/credit-card -->
                        <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        Veterinarias
                    </a>--}}

                    {{--<a href="#" class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                        <!-- Heroicon name: outline/user-group -->
                        <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Eventos
                    </a>--}}


                    {{--<a href="#" class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                        <!-- Heroicon name: outline/document-report -->
                        <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Esteticas
                    </a>--}}
                    {{--<a href="#" class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                        <!-- Heroicon name: outline/document-report -->
                        <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Entrenadores
                    </a>--}}
                </div>
                <div class="mt-6 pt-6">
                    <div class="px-2 space-y-1">
                        {{--<a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                            <!-- Heroicon name: outline/cog -->
                            <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Settings
                        </a>--}}

                        {{--<a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                            <!-- Heroicon name: outline/question-mark-circle -->
                            <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Help
                        </a>--}}

                        {{--<a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                            <!-- Heroicon name: outline/shield-check -->
                            <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Privacy
                        </a>--}}
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
