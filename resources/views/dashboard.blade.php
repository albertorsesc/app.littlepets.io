@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative">
                <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-5xl">
                    <h2 class="text-base font-semibold tracking-wider text-cyan-600 uppercase">en Little Pets</h2>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                        Unidos en la lucha contra el abandono animal
                    </p>
                    <p class="mt-5 max-w-prose mx-auto text-xl text-gray-500">
                        Cada sección nos permite concentrar esfuerzos en una solución especifica.
                    </p>

                    <div class="mt-12">
                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-1 lg:grid-cols-3">
                            {{--Adoptions--}}
                            <div class="pt-6">
                                <a href="{{ route('web.adoptions.index') }}">
                                    <div class="card transform lp-transition flow-root bg-gray-50 rounded-lg shadow-lg sm:px-28 md:px-6 pb-8">

                                        <div class="-mt-6">
                                            <div>
                                  <span class="animate-bounce inline-flex items-center justify-center p-3 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-md shadow-lg">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                  </span>
                                            </div>
                                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Adopciones</h3>
                                            <p class="flex justify-center">
                                                <i class="fas fa-globe-americas text-base text-blue-400"></i>
                                            </p>
                                            <p class="mt-5 text-base text-gray-500">
                                                Entre más grande sea nuestra comunidad, más posibilidades tienen de encontrar el hogar que merecen.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{--LostPets--}}
                            <div class="pt-6">
                                <a href="{{ route('web.lost-pets.index') }}">
                                    <div class="card transform lp-transition flow-root bg-gray-50 rounded-lg shadow-lg sm:px-28 md:px-6 pb-8">
                                        <div class="-mt-6">
                                            <div>
                                              <span class="animate-bounce inline-flex items-center justify-center p-3 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-md shadow-lg">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                                </svg>
                                            </span>
                                            </div>
                                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Perdidos y Encontrados</h3>
                                            <p class="flex justify-center">
                                                <i class="fas fa-globe-americas text-base text-blue-400"></i>
                                            </p>
                                            <p class="mt-5 text-base text-gray-500">
                                                Aumenta las posibilidades de encontrar a tu mascota extraviada o
                                                en caso de encontrar una mascota ayúdala a regresar a casa.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{--Vets--}}
                            <div class="pt-6">
                                <a href="/veterinarias">
                                    <div class="card transform lp-transition flow-root bg-gray-50 rounded-lg shadow-lg sm:px-28 md:px-6 pb-8">
                                        <div class="-mt-6">
                                            <div>
                                              <span class="animate-bounce inline-flex items-center justify-center py-3 px-3 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-md shadow-lg items-center align-middle">
                                                  <i class="fas fa-clinic-medical text-white text-xl"></i>
                                              </span>
                                            </div>
                                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Veterinarias</h3>
                                            <p class="flex justify-center">
                                                <i class="fas fa-globe-americas text-base text-blue-400"></i>
                                            </p>
                                            <p class="mt-5 text-base text-gray-500 pb-5">
                                                Únete a la comunidad y deja que tus pacientes te encuentren en cualquier momento.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            {{--Organizations--}}
                            <div class="pt-6">
                                <div class="flow-root bg-gray-50 rounded-lg shadow-lg sm:px-28 md:px-6 pb-8">
                                    <div class="-mt-6">
                                        <div>
                          <span class="inline-flex items-center justify-center p-3 bg-gradient-to-r from-gray-300 to-gray-400 rounded-md shadow-lg">
                            <!-- Heroicon name: outline/cog -->
    {{--<svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>--}}

                              <i class="fas fa-university text-white text-xl"></i>
                          </span>
                                        </div>
                                        <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Organizaciones</h3>
                                        <span class="text-xs text-cyan-500">Próximamente</span>
                                        <p class="mt-5 text-base text-gray-500">
                                            En Little Pets tenemos un lugar especial para Control Animal y Refugios del País.
                                            Unidos logramos más.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{--Donations--}}
                            <div class="pt-6">
                                <div class="flow-root bg-gray-50 rounded-lg shadow-lg sm:px-28 md:px-6 pb-8">
                                    <div class="-mt-6">
                                        <div>
                                              <span class="inline-flex items-center justify-center p-3 bg-gradient-to-r from-gray-300 to-gray-400 rounded-md shadow-lg">
                                                <i class="fas fa-hand-holding-heart text-white text-xl"></i>
                                              </span>
                                        </div>
                                        <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Donaciones</h3>
                                        <span class="text-xs text-cyan-500">Próximamente</span>
                                        <p class="mt-5 text-base text-gray-500">
                                            Buscamos organizar esfuerzos de forma transparente y segura para que la mayor cantidad de
                                            animales reciban lo que necesitan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{--Other Businesses--}}
                            <div class="pt-6">
                                <div class="flow-root bg-gray-50 rounded-lg shadow-lg sm:px-28 md:px-6 pb-14">
                                    <div class="-mt-6">
                                        <div>
                          <span class="inline-flex items-center justify-center p-3 bg-gradient-to-r from-gray-300 to-gray-400 rounded-md shadow-lg">
                                <i class="fas fa-store text-white text-xl"></i>
                          </span>
                                        </div>
                                        <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Invitamos a</h3>
                                        <span class="text-xs text-cyan-500">Próximamente</span>
                                        <p class="mt-5 text-base text-gray-500">
                                            Estéticas, Entrenadores, Tienda de accesorios y cualquier negocio que mejore la vida de los animales...
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
