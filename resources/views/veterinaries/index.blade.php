@extends('layouts.app')

@section('title', 'Veterinarias')

@section('styles')
    <link rel="stylesheet" href="/css/vue-multiselect.min.css">
@endsection

@section('content')

    <veterinaries inline-template>
        <div>
            <!-- Page header -->
            <div class="bg-white shadow">
                <div class="px-4 sm:px-6 lg:mx-auto lg:px-8">
                    <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                        <div class="lg:flex-1 lg:flex min-w-0">
                            <div class="md:flex items-center">
                                <div class="md:flex lg:flex-col">
                                    {{--Title--}}
                                    <div class="mr-3 flex items-center">
                                        <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate"
                                            v-text="headerTitle"
                                            v-cloak
                                        ></h1>
                                    </div>
                                    <dl class="mt-3 lg:mt-2 flex flex-col sm:mt-1 sm:flex-row sm:flex-wrap items-center">
                                        <dd class="flex items-center align-middle text-sm text-gray-500 font-medium sm:mr-6">
                                            <i class="fas fa-clinic-medical flex-shrink-0 mt-1 mr-1.5 h-5 w-5 text-gray-400"></i>
                                            Explora o Registra tu clínica veterinaria y deja que tus pacientes te encuentren!
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="sm:flex lg:ml-24 items-center lg:-mb-8 mt-3 lg:mt-0">
                                <a @click="activeTab = 'explore-veterinaries'"
                                   href="#"
                                   class="text-cyan-500 text-lg md:text-base hover:text-cyan-700 border-cyan-300 mx-2"
                                   :class="[activeTab === 'explore-veterinaries' ? 'border-b-2 border-emerald-400 text-cyan-600' : 'hover:border-emerald-400 hover:text-cyan-600']">
                                    Explorar Veterinarias
                                </a>
                                <a @click="activeTab = 'my-veterinaries'"
                                   href="#"
                                   class="flex md:flex-none mt-2 sm:mt-0 text-cyan-500 text-lg md:text-base hover:text-cyan-700 border-cyan-300 mx-2"
                                   :class="[activeTab === 'my-veterinaries' ? 'border-b-2 border-emerald-400 text-cyan-600' : 'hover:border-emerald-400 hover:text-cyan-600']">
                                    Mis Veterinarias
                                </a>
                                {{--<a href="#"
                                   class="text-cyan-500 text-lg md:text-base hover:text-cyan-700 hover:border-b hover:border-cyan-300 mx-1">
                                    Mis Intereses
                                </a>--}}
                                {{--<a href="#"
                                   class="text-cyan-500 text-lg md:text-base hover:text-cyan-700 hover:border-b hover:border-cyan-300 mx-1">
                                    Busqueda Avanzada
                                </a>--}}
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
                                <div class="">

                                     <explore-veterinaries
                                         v-show="activeTab === 'explore-veterinaries'"
                                     ></explore-veterinaries>

                                    <my-veterinaries
                                        v-show="activeTab === 'my-veterinaries'"
                                    ></my-veterinaries>

                                </div>
                            </div>
                        </div>
                    </section>
                </main>
                {{--                <aside class="md:w-1/3 bg-red-300 my-8 border-l border-gray-200 overflow-y-auto lg:block">--}}
                {{--                </aside>--}}
            </div>
        </div>
    </veterinaries>

@endsection
