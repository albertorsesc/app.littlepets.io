@extends('layouts.app')

@section('title', 'Perdidos y Encontrados')

@section('content')
    <lost-pets inline-template>

        <div>
            <!-- Page header -->
            <div class="bg-white shadow">
                <div class="px-4 sm:px-6 lg:mx-auto lg:px-8">
                    <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                        <div class="lg:flex-1 lg:flex min-w-0">
                            <div class="md:flex items-center">
                                <div class="">
                                    {{--Title--}}
                                    <div class="mr-3 flex items-center">
                                        <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate"
                                            v-text="headerTitle"
                                            v-cloak
                                        ></h1>
                                    </div>
                                    <dl class="mt-3 lg:mt-2 flex flex-col sm:mt-1 sm:flex-row sm:flex-wrap">
                                        <dd class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                            </svg>
                                            Ayudemos a estos angelitos a encontrar su hogar!
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="md:flex lg:ml-24 items-center align-middle lg:-mb-8 lg:space-x-3 mt-3 lg:mt-2">
                                <a @click="activeTab = 'explore-lost-pets'"
                                   href="#"
                                   class="text-cyan-500 text-lg md:text-base hover:text-cyan-700 border-cyan-300 mx-1"
                                   :class="[activeTab === 'explore-lost-pets' ? 'border-b-2 border-emerald-400 text-cyan-600' : 'hover:border-emerald-400 hover:text-cyan-600']">
                                    Explorar Extraviados
                                </a>
                                <a @click="activeTab = 'my-lost-pets'"
                                   href="#"
                                   class="hidden md:block text-cyan-500 text-lg md:text-base hover:text-cyan-700 hover:border-b border-cyan-300 mx-1"
                                   :class="[activeTab === 'my-lost-pets' ? 'border-b-2 border-emerald-400 text-cyan-600' : 'hover:border-emerald-400 hover:text-cyan-600']">
                                    Mis Mascotas Registradas
                                </a>
                                <a @click="activeTab = 'my-lost-pets'"
                                   href="#"
                                   class="block md:hidden mt-2 text-cyan-500 text-lg md:text-base hover:text-cyan-700 hover:border-b border-cyan-300 mx-1"
                                   :class="[activeTab === 'my-lost-pets' ? 'border-b-2 border-emerald-400 text-cyan-600' : 'hover:border-emerald-400 hover:text-cyan-600']">
                                    Mis Registros
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="min-h-screen w-full flex-1 flex items-stretch overflow-hidden">
                <main class="md:w-2/3 flex-1 overflow-y-auto">
                    <!-- Primary column -->
                    <section aria-labelledby="primary-heading"
                             class="min-w-0 flex-1 h-full flex flex-col overflow-hidden lg:order-last">
                        <div class="mt-8">
                            <div class="px-4 sm:px-6 lg:px-8">
                                <div>

                                    <explore-lost-pets
                                        v-show="activeTab === 'explore-lost-pets'"
                                    ></explore-lost-pets>

                                    <my-lost-pets
                                        v-show="activeTab === 'my-lost-pets'"
                                    ></my-lost-pets>

                                </div>
                            </div>
                        </div>
                    </section>
                </main>
                {{--                <aside class="md:w-1/3 bg-red-300 my-8 border-l border-gray-200 overflow-y-auto lg:block">--}}
                {{--                </aside>--}}
            </div>
        </div>

    </lost-pets>
@endsection
