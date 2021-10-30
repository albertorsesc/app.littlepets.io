@extends('layouts.app')

@section('title', e($organization->name))

@section('styles')
@endsection

@section('content')

    <organization-profile :organization="{{ json_encode($organization) }}" inline-template>
        <div>
            <!-- Page header -->
            <div class="bg-white shadow">
                <div class="px-4 sm:px-6 lg:mx-auto lg:px-8">
                    <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                        <div class="md:flex-1 md:flex justify-between min-w-0">
                            <!-- Profile -->
                            <div class="md:flex items-center">
                                <div>
                                    {{--Title--}}
                                    <div class="flex items-center align-middle my-auto">
                                        <h1 class="lg:ml-3 text-2xl font-medium leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                            <span class="text-cyan-500 font-bold" v-text="organization.name"></span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 lg:mt-0 md:my-auto flex justify-between items-center align-middle lg:mr-48 lg:-mb-8 md:space-x-3">
                                <div class="hidden lg:flex -mx-2">

                                </div>
                                <div class="flex justify-between items-center lg:-mt-8">
                                    @if(auth()->user()->isRoot())
                                        <button @click="verify()"
                                                type="button"
                                                class="mx-2 md:mx-1 items-center shadow-sm w-full py-1 px-3 flex justify-center border border-gray-200 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring focus:border-cyan-300 active:bg-gray-50 active:text-gray-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-1 h-8 w-8 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span v-if="! organization.meta.verifiedAt"
                                                  class="text-gray-400"
                                                  title="Verificar Organizacion."
                                            >Verificar</span>
                                            <span v-if="organization.meta.verifiedAt"
                                                  class="text-gray-400"
                                                  title="Ocultas Organizacion del Publico."
                                            >Eliminar Verificacion</span>
                                        </button>
                                    @endif
                                    @if(auth()->id() === $organization->owner->id || auth()->user()->isRoot())
                                        <a href="{{ route('web.organizations.settings', $organization) }}"
                                           class="mx-2 md:mx-1 items-center shadow-sm w-full py-2 px-3 flex justify-center border border-gray-200 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring focus:border-cyan-300 active:bg-gray-50 active:text-gray-800"
                                           :class="'w-1/2'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 font-semibold h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                    @endif
                                    {{--Report--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Disclosure if not validated to non-team owner/member--}}
            <div v-if="! organization.meta.verifiedAt" class="w-full rounded-md bg-blue-50 border border-blue-100 shadow-sm p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: solid/information-circle -->
                        <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1 md:flex md:justify-between">
                        <p class="hidden lg:flex text-base text-blue-700 items-center">
                            Antes de realizar un donativo a esta organizacion asegurate que posean esta insignia junto a su nombre
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-1 h-8 w-8 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            para validar su legitimidad, realiza tus investigaciones para confirmar.
                        </p>
                        <p class="block lg:hidden text-base text-blue-700 flex items-center">
                            <span v-text="organization.name"></span> aun no ha sido verificada por LittlePets.
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-1 h-8 w-8 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </p>
                    </div>
                </div>
            </div>

            <main class="w-full">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="w-full xl:w-full py-6 sm:px-0">
                        <div class="w-full">
                            {{--Tabs--}}
                            <div class="w-3/5 md:items-center sm:px-6">
                                <div role="tablist"
                                     aria-orientation="horizontal"
                                     class="flex justify-between p-1 space-x-1 mt-8 rounded-xl bg-gradient-to-r from-cyan-600 items-center justify-center overflow-hidden relative rounded-xl to-cyan-500 transition hover:transform"
                                     :class="activeTab === 'profile' ? ' mb-12' : 'mb-0'"
                                     v-cloak>
                                    <button @click="activeTab = 'profile'"
                                            class="w-full py-4 text-lg leading-5 rounded-lg focus:outline-none focus:ring-2 ring-offset-2 ring-offset-cyan-600 ring-white ring-opacity-60 hover:bg-white hover:text-cyan-600 hover:font-bold hover:opacity-90 transition hover:transform"
                                            :class="activeTab === 'profile' ? 'bg-white font-bold text-cyan-600' : 'bg-transparent text-white font-semibold'"
                                            id="headlessui-tabs-tab-1"
                                            role="tab"
                                            aria-selected="false"
                                            tabindex="-1">
                                        Perfil
                                    </button>

                                    <button @click="activeTab = 'adoptions'"
                                            class="w-full py-4 text-lg leading-5 rounded-lg focus:outline-none focus:ring-2 ring-offset-2 ring-offset-cyan-600 ring-white ring-opacity-60 hover:bg-white hover:text-cyan-600 hover:font-bold hover:opacity-90 transition hover:transform" id="headlessui-tabs-tab-2" role="tab" aria-selected="true" tabindex="0" aria-controls="headlessui-tabs-panel-5"
                                            :class="activeTab === 'adoptions' ? 'bg-white font-bold text-cyan-600' : 'bg-transparent text-white font-semibold'">
                                        Adopciones
                                    </button>
                                </div>
                            </div>

                            <!--                        <alert v-if="localVeterinary.user.id === auth && ! localVeterinary.location"
                                                           :type="'warning'">
                                                        Para Publicar la veterinaria es necesario registrar su Dirección
                                                    </alert>-->
                        </div>

                        <div v-show="activeTab === 'profile'"
                             class="relative min-h-screen bg-gray-100">
                            <main class="py-10">
                                <!-- Page header -->
                                <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:space-x-5 lg:max-w-7xl lg:px-8">
                                    <div class="-mb-6 lg:-mb-6 flex items-center align-middle space-x-5">
                                        <!--                                    <likes :endpoint="`/veterinaries/${localVeterinary.slug}`"
                                                                                   :model="localVeterinary"
                                                                                   :model-id="localVeterinary.slug"
                                                                            ></likes>-->
                                    </div>
                                </div>

                                <div class="mt-8 max-w-3xl lg:max-w-5xl grid grid-cols-1 gap-6 sm:px-6 lg:grid-flow-col-dense lg:grid-cols-3">
                                    <div class="space-y-6 lg:col-start-1 lg:col-span-4">
                                        <!-- Description list-->
                                        <section aria-labelledby="applicant-information-title">
                                            <div class="bg-white shadow sm:rounded-lg">
                                                <div class="flex px-4 py-5 sm:px-6 items-center align-middle">
                                                    <h2 id="applicant-information-title" class="mr-4 text-lg leading-6 font-medium text-gray-900 truncate">
                                                        <span class="hidden md:block">Perfil de la Organizacion</span>
                                                        <span class="block md:hidden">Perfil</span>
                                                    </h2>
                                                    <dt class="flex text-sm font-medium text-gray-500 items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        Verificada
                                                    </dt>
                                                    <div class="ml-6 sm:ml-52 lg:ml-96 flex-shrink-0">
                                                        <div class="-mt-24 rounded-full border border-emerald-200 hover:border hover:border-emerald-300 hover:shadow-md bg-white z-20 p-1 inline-block absolute">
                                                            <div class="flex justify-start">
                                                                <label for="file-upload"
                                                                       class="relative">
                                                                    <form action="#"
                                                                          method="POST"
                                                                          id="logo-form"
                                                                          enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input id="file-upload"
                                                                               name="logo"
                                                                               type="file"
                                                                               class="hidden sr-only"
                                                                               onchange="document.getElementById('logo-form').submit()">
                                                                    </form>

                                                                    @if (true)
                                                                        <img src="{{ auth()->user()->getAvatar() }}"
                                                                             class="text-white inline-block object-cover object-center rounded-full h-20 lg:h-28 w-20 lg:w-28"
                                                                             loading="lazy"
                                                                             alt="">
                                                                    @else
                                                                        <img src="/logos/little_pets.png"
                                                                             class="text-white inline-block object-contain rounded-full h-20 lg:h-28 w-20 lg:w-28"
                                                                             loading="lazy"
                                                                             alt="LittlePets.io logo">
                                                                    @endif
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                                        {{--Name--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Nombre
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900"
                                                                v-text="organization.name"
                                                            ></dd>
                                                        </div>
                                                        {{--Type--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Tipo de Organizacion
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900"
                                                                v-text="organization.type"
                                                            ></dd>
                                                        </div>
                                                        {{--Phone--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Teléfono
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900"
                                                                v-text="formatPhone(organization.phone)"
                                                            ></dd>
                                                        </div>
                                                        {{--Email--}}
                                                        <div v-if="organization.email" class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Correo Electrónico
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900"
                                                                v-text="organization.email"
                                                            ></dd>
                                                        </div>
                                                        {{--Facebook--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Enlace de Facebook de la Organizacion
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 hover:text-cyan-600 hover:text-base hover:font-medium hover:underline">
                                                                <a :href="organization.facebookProfile"
                                                                   v-text="organization.facebookProfile"
                                                                ></a>
                                                            </dd>
                                                        </div>
                                                        {{--Site--}}
                                                        <div v-if="organization.site" class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Enlace de Sitio Web de la Organizacion
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 hover:text-cyan-600 hover:text-base hover:font-medium hover:underline">
                                                                <a :href="organization.site" v-text="organization.site"></a>
                                                            </dd>
                                                        </div>
                                                        {{--Capacity--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Capacidad de la Organizacion
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                <span v-text="organization.capacity"></span> <i class="ml-2 fas fa-paw text-xl text-cyan-400"></i>
                                                            </dd>
                                                        </div>
                                                        {{--Verified At--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="flex items-center text-sm font-medium text-gray-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     :class="organization.meta.verifiedAt ? 'text-cyan-300' : 'text-gray-300'"
                                                                     class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                                Fecha de Verificacion
                                                            </dt>
                                                            <dd v-if="organization.meta.verifiedAt"
                                                                class="mt-1 text-sm text-gray-900"
                                                                v-text="organization.meta.verifiedAt"
                                                            ></dd>
                                                            <dd v-else
                                                                class="mt-1 text-sm text-gray-600">
                                                                Esta Organizacion no ha sido Verificada.
                                                            </dd>
                                                        </div>
                                                        {{--PublishedAt--}}
                                                        <div v-if="organization.meta.publishedAt" class="sm:col-span-1">
                                                            <dt class="flex items-center text-sm font-medium text-gray-500">
                                                                Miembro desde hace
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 hover:text-cyan-600 hover:text-base hover:font-medium hover:underline"
                                                                v-text="organization.meta.publishedAt"
                                                            ></dd>
                                                        </div>
                                                        {{--About--}}
                                                        <div class="sm:col-span-2">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Información adicional
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">About</dd>
                                                        </div>
                                                    </dl>
                                                </div>
<!--                                                <div>
                                                    <a href="#" class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">Read full application</a>
                                                </div>-->
                                            </div>
                                        </section>

                                        <section aria-labelledby="organization-location">
                                        </section>
                                    </div>

                                    {{--<section v-if="localVeterinary.user.id === auth"
                                             aria-labelledby="timeline-title"
                                             class="lg:col-start-3 lg:col-span-1">
                                        <div class="hidden lg:flex mb-4 md:space-x-3">
                                            <button v-if="localVeterinary.location"
                                                    @click="toggle()"
                                                    type="button"
                                                    class="-mt-1 items-center shadow-sm w-1/2 py-3 flex justify-center border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring focus:border-cyan-300 active:bg-gray-50 active:text-gray-800"
                                                    :class="localVeterinary.user.id === auth && localVeterinary.location && ! localVeterinary.meta.publishedAt ? 'animate-bounce' : ''">
                                                <span v-if="localVeterinary.meta.publishedAt"
                                                      class="text-gray-300"
                                                      title="Ocultar Organizacion del Publico.">Ocultar</span>
                                                <span v-else class="text-gray-300" title="Publicar Organizacion.">Publicar</span>
                                            </button>
                                            <button @click="openModal('put')"
                                                    type="button"
                                                    class="-mt-1 items-center shadow-sm w-full py-3 flex justify-center border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring focus:border-cyan-300 active:bg-gray-50 active:text-gray-800"
                                                    :class="localVeterinary.location ? 'w-1/2' : 'w-full'">
                                                <span class="text-gray-300">Editar</span>
                                            </button>
                                        </div>
                                        <!-- Activity Feed -->
                                        <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                                            <h2 id="timeline-title" class="text-lg font-medium text-gray-900">
                                                Actividad reciente
                                            </h2>
                                            --}}{{--<div class="mt-6 flow-root">
                                                <ul role="list" class="-mb-8">
                                                    <li>
                                                        <div class="relative pb-8">
                                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                            <div class="relative flex space-x-3">
                                                                <div>
                                                                      <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                                                        <!-- Heroicon name: solid/user -->
                                                                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                                        </svg>
                                                                      </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-gray-500">Applied to <a href="#" class="font-medium text-gray-900">Front End Developer</a></p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                        <time datetime="2020-09-20">Sep 20</time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="relative pb-8">
                                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                            <div class="relative flex space-x-3">
                                                                <div>
                      <span class="h-8 w-8 rounded-full bg-cyan-500 flex items-center justify-center ring-8 ring-white">
                        <!-- Heroicon name: solid/thumb-up -->
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                      </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-gray-500">Advanced to phone screening by <a href="#" class="font-medium text-gray-900">Bethany Blake</a></p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                        <time datetime="2020-09-22">Sep 22</time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="relative pb-8">
                                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                            <div class="relative flex space-x-3">
                                                                <div>
                      <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                        <!-- Heroicon name: solid/check -->
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                      </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-gray-500">Completed phone screening with <a href="#" class="font-medium text-gray-900">Martha Gardner</a></p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                        <time datetime="2020-09-28">Sep 28</time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="relative pb-8">
                                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                            <div class="relative flex space-x-3">
                                                                <div>
                      <span class="h-8 w-8 rounded-full bg-cyan-500 flex items-center justify-center ring-8 ring-white">
                        <!-- Heroicon name: solid/thumb-up -->
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                      </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-gray-500">Advanced to interview by <a href="#" class="font-medium text-gray-900">Bethany Blake</a></p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                        <time datetime="2020-09-30">Sep 30</time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="relative pb-8">
                                                            <div class="relative flex space-x-3">
                                                                <div>
                      <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                        <!-- Heroicon name: solid/check -->
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                      </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-gray-500">Completed interview with <a href="#" class="font-medium text-gray-900">Katherine Snyder</a></p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                        <time datetime="2020-10-04">Oct 4</time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>--}}{{--
                                            <div class="mt-6 flex flex-col justify-stretch">
                                            </div>
                                        </div>
                                    </section>--}}
                                </div>
                            </main>
                        </div>

                        {{--Adoptions--}}
                        <div v-show="activeTab === 'adoptions'"
                             class="relative min-h-screen bg-gray-100">
                            <main class="py-2">
                                <!-- Page header -->
                                <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:space-x-5 lg:max-w-7xl lg:px-8"></div>

                                <div class="mt-4 max-w-3xl lg:max-w-5xl sm:px-6 lg:grid-flow-col-dense lg:grid-cols-3">
                                    <div class="items-center flex justify-start" v-cloak>
                                        <button @click="showForm = ! showForm" class="lp-btn">
                                            <span >Registra una nueva adopción</span>
                                        </button>
                                    </div>

                                    <div v-if="showForm" class="mt-8">
                                        <create-adoption></create-adoption>
                                    </div>

                                    <div v-else>
                                        <pet-list :data="organization.adoptions"></pet-list>
                                        <slider></slider>
                                    </div>
                                </div>
                            </main>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </organization-profile>

@endsection
