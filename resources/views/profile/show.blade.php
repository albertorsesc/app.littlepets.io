@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
    <profile inline-template>
        <div class="mx-auto" v-cloak>
            <div>
                <div class="relative bg-sky-700 pb-32 overflow-hidden">
                    <!-- Menu open: "bottom-0", Menu closed: "inset-y-0" -->
                    <div class="inset-y-0 absolute flex justify-center inset-x-0 left-1/2 transform -translate-x-1/2 w-full overflow-hidden lg:inset-y-0" aria-hidden="true">
                        <div class="flex-grow bg-sky-900 bg-opacity-75"></div>
                        <svg class="flex-shrink-0" width="1750" height="308" viewBox="0 0 1750 308" xmlns="http://www.w3.org/2000/svg">
                            <path opacity=".75" d="M1465.84 308L16.816 0H1750v308h-284.16z" fill="#075985" />
                            <path opacity=".75" d="M1733.19 0L284.161 308H0V0h1733.19z" fill="#0c4a6e" />
                        </svg>
                        <div class="flex-grow bg-sky-800 bg-opacity-75"></div>
                    </div>
                    <header class="relative py-10">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <h1 class="text-3xl font-bold text-white">
                                Mi Perfil
                            </h1>
                        </div>
                    </header>
                </div>

                <main class="relative -mt-32">
                    <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                                <aside class="py-6 lg:col-span-3">
                                    <nav class="space-y-1">
                                        <a href="#" @click="activeTab = 'profile'"
                                           class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page"
                                           :class="[activeTab === 'profile' ?
                                                'bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700' :
                                                'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']">
                                            <svg class="flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                                 :class="[activeTab === 'profile' ? 'text-teal-500 group-hover:text-teal-500' : 'text-gray-400 group-hover:text-gray-500']"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="truncate">
                                              Perfil
                                            </span>
                                        </a>

                                        <a href="#" @click="activeTab = 'password'"
                                           class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page"
                                           :class="[activeTab === 'password' ?
                                                'bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700' :
                                                'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']">
                                            <svg class="flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                                 :class="[activeTab === 'password' ? 'text-teal-500 group-hover:text-teal-500' : 'text-gray-400 group-hover:text-gray-500']"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                            </svg>
                                            <span class="truncate">
                                              Contraseña
                                            </span>
                                        </a>

                                        <a href="#" @click="activeTab = 'delete'"
                                           class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page"
                                           :class="[activeTab === 'delete' ?
                                                'bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700' :
                                                'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']">
                                            <svg class="flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                                 :class="[activeTab === 'delete' ? 'text-teal-500 group-hover:text-teal-500' : 'text-gray-400 group-hover:text-gray-500']"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span class="truncate">
                                              Cuenta
                                            </span>
                                        </a>
                                    </nav>
                                </aside>

                                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                    <div v-show="activeTab === 'profile'" class="lg:col-span-9">
                                        @livewire('profile.update-profile-information-form')
                                    </div>
                                @endif

                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                    <div v-show="activeTab === 'password'" class="lg:col-span-6">
                                        @livewire('profile.update-password-form')
                                    </div>
                                @endif

                                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                    <div v-show="activeTab === 'delete'" class="lg:col-span-6 mt-10 sm:mt-0">
                                        @livewire('profile.delete-user-form')
                                    </div>
                                    @endif

                            </div>

                            {{--@if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.two-factor-authentication-form')
                                </div>

                                <x-jet-section-border />
                            @endif

                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.logout-other-browser-sessions-form')
                            </div>
                            --}}
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </profile>
@endsection
