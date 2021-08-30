@extends('layouts.app')

@section('title', 'Sugerencias')

@section('content')

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
                                    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                        Buzón de Sugerencias
                                    </h1>
                                </div>
                                <dl class="mt-3 lg:mt-2 flex flex-col sm:mt-1 sm:flex-row sm:flex-wrap items-center">
                                    <dd class="flex items-center align-middle text-sm text-gray-500 font-medium sm:mr-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-red-400 h-6 w-6" fill="red" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        Queremos hacer de LittlePets la plataforma que ellos necesitan!
                                    </dd>
                                </dl>
                            </div>
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
                            <div class="relative">
                                <div class="absolute inset-0">
                                    <div class="absolute inset-y-0 left-0 w-1/2"></div>
                                </div>
                                <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-5">
                                    <div class="lg:py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 lg:py-24 xl:pr-12">
                                        <div class="max-w-lg mx-auto">
                                            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                                                Nos encantaría leer tus sugerencias
                                            </h2>
                                            <p class="mt-3 text-lg leading-6 text-gray-500 text-justify">
                                                El equipo de LittlePets trabaja incansablemente para desarrollar nuevas funcionalidades y solucionar
                                                errores ocasionales que naturalmente se descubren, sin embargo tus sugerencias nos
                                                ayudarían muchísimo para añadir lo que es más importante para ti.
                                            </p>
                                            <dl class="mt-8 text-base text-gray-500">
                                                <div class="mt-3">
                                                    <dt class="sr-only">Correo Electrónico</dt>
                                                    <dd class="flex">
                                                        <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                        </svg>
                                                        <span class="ml-3">soporte@littlepets.io</span>
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg align-middle shadow-lg py-6 px-4 sm:px-6 lg:col-span-3 lg:py-18 lg:px-8 xl:pl-12">
                                        @if (session()->has('success'))
                                            <div class="">
                                                @include('general-components.alert', ['message' => session()->get('success')])
                                            </div>
                                        @endif
                                        <div class="max-w-lg mx-auto lg:max-w-none py-10">
                                            <form action="{{ route('suggestions.store') }}" method="POST" class="grid grid-cols-1 gap-y-8">
                                                @csrf
                                                <div>
                                                    <label for="subject" class="sr-only">Asunto</label>
                                                    <input type="text"
                                                           name="subject"
                                                           id="subject"
                                                           autocomplete="subject"
                                                           class="h-input block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                                           placeholder="Asunto">
                                                </div>
                                                <div>
                                                    <label for="body" class="sr-only">Sugerencia</label>
                                                    <textarea id="body"
                                                              name="body"
                                                              rows="8"
                                                              class="h-input block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                                              placeholder="Sugerencia"
                                                    ></textarea>
                                                </div>
                                                <div class="w-full">
                                                    <button type="submit" class="lp-btn-success w-1/4">
                                                        Enviar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

@endsection
