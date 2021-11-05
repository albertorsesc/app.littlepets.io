@extends('layouts.app')

@section('title', e($veterinary->name))

@section('meta')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $veterinary->name }}">
    <meta name="description" content="{{ $veterinary->about ?? '' }} en {{ $veterinary->location ? $veterinary->location->first()->city : '' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $veterinary->name }}">
    <meta property="og:description" content="{{ $veterinary->about ?? '' }} en {{ $veterinary->location ? $veterinary->location->first()->city : '' }}">
    <meta property="og:image" content="{{ $veterinary->logo }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="En LittlePets.io Unidos en la lucha contra del abandono animal">
    <meta property="twitter:url" content="{{ $veterinary->profile() }}">
    <meta property="twitter:title" content="{{ $veterinary->name }}">
    <meta property="twitter:description" content="{{ $veterinary->about ?? '' }} en {{ $veterinary->location ? $veterinary->location->first()->city : '' }}">
    <meta property="twitter:image" content="{{ $veterinary->logo ?? '' }}">
@endsection

@section('styles')
    <link rel="stylesheet" href="/css/vue-multiselect.min.css">
@endsection

@section('content')
    <veterinary-profile :veterinary="{{ json_encode($veterinary) }}"  inline-template>
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
                                            <span class="text-cyan-500 font-bold">@{{ localVeterinary.name }}</span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 lg:mt-0 md:my-auto flex justify-between items-center align-middle lg:mr-48 lg:-mb-8 md:space-x-3">
                                <div v-if="localVeterinary.user.id === auth" class="hidden lg:flex -mx-2">

                                </div>
                                <div class="flex justify-between items-center lg:-mt-8">
                                    <button v-if="localVeterinary.user.id === auth && localVeterinary.location"
                                            @click="toggle()"
                                            type="button"
                                            class="mx-2 md:mx-1 items-center shadow-sm w-full py-3 px-3 flex justify-center border border-gray-200 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring focus:border-cyan-300 active:bg-gray-50 active:text-gray-800"
                                            :class="localVeterinary.user.id === auth && localVeterinary.location && ! localVeterinary.meta.publishedAt ? 'animate-bounce' : ''">
                                                <span v-if="localVeterinary.meta.publishedAt"
                                                      class="text-gray-400"
                                                      title="Ocultar Veterinaria del Publico.">Ocultar</span>
                                        <span v-else class="text-gray-400" title="Publicar Veterinaria.">Publicar</span>
                                    </button>
                                    <button  v-if="localVeterinary.user.id === auth"
                                             @click="openModal('put')"
                                            type="button"
                                            class="mx-2 md:mx-1 items-center shadow-sm w-full py-3 px-3 flex justify-center border border-gray-200 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:ring focus:border-cyan-300 active:bg-gray-50 active:text-gray-800"
                                            :class="localVeterinary.location ? 'w-1/2' : 'w-full'">
                                        <span class="text-gray-400 font-semibold">Editar</span>
                                    </button>
                                    {{--Delete--}}
                                    <button v-if="localVeterinary.user.id === auth"
                                            @click="onDelete"
                                            class="mx-2 md:mx-1 inline-flex items-center justify-center px-3 py-3 bg-white border border-gray-200 border border-gray-200 rounded-md shadow-sm font-medium text-base text-gray-700 transition ease-in-out duration-150"
                                            title="Eliminar Veterinaria">
                                        <svg class="text-red-500 hover:text-red-600" width="25" height="25"  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                    {{--Report--}}
                                    <report v-if="localVeterinary.user.id !== auth" :model-id="localVeterinary.uuid" model-name="veterinaries" inline-template>
                                        <div>
                                            <button @click="openModal('report')"
                                                    class="mx-2 md:mx-1 inline-flex items-center justify-center px-3 py-3 bg-white border border-gray-200 border border-gray-200 rounded-md shadow-sm font-medium text-base text-gray-700 transition ease-in-out duration-150"
                                                    title="Reportar Veterinaria...">
                                                <svg class="text-yellow-500 hover:text-yellow-600" width="25" height="25" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                            </button>
                                            <modal modal-id="reports" max-width="sm:max-w-md">
                                                <template #title>Reportar Veterinaria</template>
                                                <template #content>
                                                    <form @submit.prevent>
                                                        <div class="w-full">
                                                            <div class="w-full">
                                                                <label for="reporting_cause">
                                                                    <strong class="required">*</strong>
                                                                    Causa del Reporte
                                                                    <span class="text-gray-500 text-xs">(requerido)</span>
                                                                </label>
                                                                <div class="mt-1">
                                                                    <select v-model="report.reportingCause"
                                                                            class="lp-select"
                                                                            id="reporting_cause">
                                                                        <option value="" selected disabled>Seleccione una Causa...</option>
                                                                        @foreach(\App\Models\Veterinaries\Veterinary::getReportingCauses() as $key => $reportingCause)
                                                                            <option value="{{ $reportingCause }}">{{ $reportingCause }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <errors :error="errors.reporting_cause"></errors>
                                                            </div>
                                                            <div class="w-full mt-4">
                                                                <div>
                                                                    <label for="report_comments">Comentarios</label>
                                                                    <textarea v-model="report.comments"
                                                                              id="report_comments"
                                                                              class="lp-input form-input block w-full"
                                                                              rows="5"
                                                                              v-text="report.comments"
                                                                    ></textarea>
                                                                    <errors :error="errors.comments"></errors>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </template>
                                                <template #footer>
                                                    <button @click="closeModal()"
                                                            type="button" class="lp-btn">
                                                        Cancelar
                                                    </button>
                                                    <button @click="submitReport"
                                                            class="lp-btn-success">
                                                        Guardar
                                                    </button>
                                                </template>
                                            </modal>
                                        </div>
                                    </report>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main class="w-full">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="w-full xl:w-2/3 py-6 sm:px-0">
                        <div class="w-full xl:w-2/3">
                            <alert v-if="localVeterinary.user.id === auth && ! localVeterinary.location"
                                   :type="'warning'">
                                Para Publicar la veterinaria es necesario registrar su Dirección
                            </alert>
                        </div>
                        <div class="relative min-h-screen bg-gray-100">
                            <main class="py-10">
                                <!-- Page header -->
                                <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:space-x-5 lg:max-w-7xl lg:px-8">
                                    <div class="-mb-6 lg:-mb-6 flex items-center align-middle space-x-5">
                                        @auth
                                            <likes :endpoint="`/veterinaries/${localVeterinary.slug}`"
                                                   :model="localVeterinary"
                                                   :model-id="localVeterinary.slug"
                                            ></likes>
                                        @endauth
                                    </div>
                                </div>

                                <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                                    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                                        <!-- Description list-->
                                        <section aria-labelledby="applicant-information-title">
                                            <div class="bg-white shadow sm:rounded-lg">
                                                <div class="flex px-4 py-5 sm:px-6 items-center align-middle">
                                                    <h2 id="applicant-information-title" class="mr-4 text-lg leading-6 font-medium text-gray-900 truncate">
                                                        <span class="hidden md:block">Información de la Veterinaria</span>
                                                        <span class="block md:hidden">Información</span>
                                                    </h2>
                                                    <span v-if="localVeterinary.meta.publishedAt" class="mt-1 flex items-center py-1 px-3 text-sm text-gray-500 bg-teal-100 shadow-sm rounded-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 text-teal-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        Visible
                                                    </span>
                                                    <span v-else class="mt-1 flex items-center py-1 px-3 text-sm text-gray-500 bg-gray-100 shadow-sm rounded-full">
                                                        <svg class="mr-1 h-6 w-6 text-gray-500"
                                                             xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                                        </svg>
                                                        Oculta
                                                    </span>
                                                    <div class="ml-6 sm:ml-52 lg:ml-36 flex-shrink-0">
                                                        <div class="-mt-24 rounded-full border border-emerald-200 hover:border hover:border-emerald-300 hover:shadow-md bg-white z-20 p-1 inline-block absolute">
                                                            <div class="flex justify-start">
                                                                <label for="file-upload"
                                                                       class="relative"
                                                                       :class="isAuthenticated && localVeterinary.user.id === auth ? 'cursor-pointer' : ''">
                                                                    <form v-if="isAuthenticated && localVeterinary.user.id === auth"
                                                                          action="{{ route('veterinaries.logo.store', $veterinary) }}"
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

                                                                    @if ($veterinary->logo)
                                                                        <img src="{{ str_replace('public', 'storage', $veterinary->logo) }}"
                                                                             class="text-white inline-block object-cover object-center rounded-full h-20 lg:h-28 w-20 lg:w-28"
                                                                             loading="lazy"
                                                                             alt="{{ $veterinary->name }}">
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
                                                            <dd v-text="localVeterinary.name"
                                                                class="mt-1 text-sm text-gray-900"
                                                            ></dd>
                                                        </div>
                                                        {{--Services--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Servicios
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                <div class="">
                                                                    <ul class="flex flex-wrap items-center align-middle">
                                                                        <li v-for="(service, index) in localVeterinary.services"
                                                                            :key="index">
                                                                            <span class="mx-1 my-1 flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-cyan-100 rounded-full"
                                                                                  v-text="service"
                                                                            ></span>
                                                                        </li>
                                                                    </ul>

                                                                </div>
                                                            </dd>
                                                        </div>
                                                        {{--Specialty--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Especialidad
                                                            </dt>
                                                            <dd v-text="localVeterinary.specialty" class="mt-1 text-sm text-gray-900"></dd>
                                                        </div>
                                                        {{--Phone--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Teléfono
                                                            </dt>
                                                            <dd v-text="formatPhone(localVeterinary.phone)" class="mt-1 text-sm text-gray-900"></dd>
                                                        </div>
                                                        {{--Email--}}
                                                        <div v-if="localVeterinary.email" class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Correo Electrónico
                                                            </dt>
                                                            <dd v-text="localVeterinary.email"
                                                                class="mt-1 text-sm text-gray-900"
                                                            ></dd>
                                                        </div>
                                                        {{--Facebook--}}
                                                        <div v-if="localVeterinary.facebookProfile" class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Enlace de Facebook de la Veterinaria
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 hover:text-cyan-600 hover:text-base hover:font-medium hover:underline">
                                                                <a :href="localVeterinary.facebookProfile"
                                                                   v-text="localVeterinary.facebookProfile"
                                                                ></a>
                                                            </dd>
                                                        </div>
                                                        {{--Facebook--}}
                                                        <div v-if="localVeterinary.site" class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Enlace de Sitio Web de la Veterinaria
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 hover:text-cyan-600 hover:text-base hover:font-medium hover:underline">
                                                                <a :href="localVeterinary.site"
                                                                   v-text="localVeterinary.site"
                                                                ></a>
                                                            </dd>
                                                        </div>
                                                        {{--OpenAtNight--}}
                                                        <div class="sm:col-span-1">
                                                            <dt class="flex text-sm font-medium text-gray-500 items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-cyan-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                                                </svg>
                                                                Abierto 24 hr / Emergencias
                                                            </dt>
                                                        </div>
                                                        {{--PublishedAt--}}
                                                        <div v-if="localVeterinary.publishedAt" class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Publicado
                                                            </dt>
                                                            <dd v-text="localVeterinary.publishedAt"
                                                                class="mt-1 text-sm text-gray-900"
                                                            ></dd>
                                                        </div>
                                                        {{--About--}}
                                                        <div v-if="localVeterinary.about"
                                                             class="sm:col-span-2">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Información adicional
                                                            </dt>
                                                            <dd v-text="localVeterinary.about" class="mt-1 text-sm text-gray-900"></dd>
                                                        </div>
                                                    </dl>
                                                </div>
                                                {{--<div>
                                                    <a href="#" class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">Read full application</a>
                                                </div>--}}
                                            </div>
                                        </section>

                                        <section aria-labelledby="veterinary-location">
                                            <veterinary-location></veterinary-location>
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
                                                      title="Ocultar Veterinaria del Publico.">Ocultar</span>
                                                <span v-else class="text-gray-300" title="Publicar Veterinaria.">Publicar</span>
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

                    </div>
                </div>
            </main>

            <modal v-if="localVeterinary.user.id === auth" modal-id="update-veterinary" max-width="sm:max-w-5xl">
                <template #title>Actualizar Datos de la Veterinaria</template>
                <template #content>
                    <form @submit.prevent>
                        {{--Services--}}
                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <div class="w-full md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="services" class="block text-sm font-medium text-gray-700">
                                        <strong class="required">*</strong>
                                        Servicios
                                    </label>
                                    <div class="mt-1">
                                        <vue-multiselect v-model="veterinaryForm.services"
                                                         value="Object"
                                                         :placeholder="''"
                                                         :options="veterinaryServices"
                                                         :multiple="true"
                                                         :taggable="true"
                                                         :hide-selected="true"
                                                         id="services"
                                                         :searchable="true"
                                                         :close-on-select="false"
                                                         select-label=""
                                                         selected-label=""
                                                         deselect-label=""
                                                         :tag-placeholder="''"
                                                         placeholder="Selecciona los servicios que se ofrecen..."
                                        ></vue-multiselect>
                                    </div>
                                    <p v-if="errors.services"
                                       v-text="errors.services[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            {{--Specialty--}}
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="specialty" class="block text-sm font-medium text-gray-700">
                                        Especialidad
                                        <span class="optional">(opcional)</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text"
                                               v-model="veterinaryForm.specialty"
                                               id="specialty"
                                               class="lp-input"
                                               :class="errors.specialty ? 'border-2 border-red-400' : ''">
                                    </div>
                                    <p v-if="errors.specialty"
                                       v-text="errors.specialty[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                            {{--Phone--}}
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">
                                        <strong class="required">*</strong>
                                        Teléfono
                                    </label>
                                    <div class="mt-1">
                                        <input type="text"
                                               v-model="veterinaryForm.phone"
                                               id="phone"
                                               class="lp-input"
                                               :class="errors.phone ? 'border-2 border-red-400' : ''">
                                    </div>
                                    <p v-if="errors.phone"
                                       v-text="errors.phone[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                            {{--Email--}}
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        Correo Electrónico
                                        <span class="optional">(opcional)</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text"
                                               v-model="veterinaryForm.email"
                                               id="email"
                                               class="lp-input"
                                               :class="errors.email ? 'border-2 border-red-400' : ''">
                                    </div>
                                    <p v-if="errors.email"
                                       v-text="errors.email[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            {{--FacebookProfile--}}
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="facebook_profile" class="block text-sm font-medium text-gray-700">
                                        Perfil de Facebook
                                        <span class="optional">(opcional)</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text"
                                               v-model="veterinaryForm.facebookProfile"
                                               id="facebook_profile"
                                               class="lp-input"
                                               :class="errors.facebook_profile ? 'border-2 border-red-400' : ''">
                                    </div>
                                    <p v-if="errors.facebook_profile"
                                       v-text="errors.facebook_profile[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                            {{--Site--}}
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="site" class="block text-sm font-medium text-gray-700">
                                        Sitio Web
                                        <span class="optional">(opcional)</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text"
                                               v-model="veterinaryForm.site"
                                               id="site"
                                               class="lp-input"
                                               :class="errors.site ? 'border-2 border-red-400' : ''">
                                    </div>
                                    <p v-if="errors.site"
                                       v-text="errors.site[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                            {{--OpenAtNight--}}
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0 mb-4">
                                <div class="form-group">
                                    <div class="relative flex items-start items-center mt-2">
                                        <div class="flex items-center h-5">
                                            <input id="is_open_at_night"
                                                   aria-describedby="is_open_at_night_description"
                                                   v-model="veterinaryForm.isOpenAtNight"
                                                   type="checkbox"
                                                   class="focus:ring-cyan-500 h-6 w-6 text-cyan-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="is_open_at_night" class="font-medium text-gray-700">
                                                Abierto 24hr?
                                                <p id="is_open_at_night_description" class="text-gray-500">
                                                    Seleccione la casilla si su clínica esta abierta 24 horas por lo menos 3 dias a la semana.
                                                </p>
                                            </label>
                                        </div>
                                    </div>
                                    <p v-if="errors.is_open_at_night"
                                       v-text="errors.is_open_at_night[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-2">
                            <div class="w-full md:w-2/3 md:mx-2 mt-3 md:mt-0 mb-4">
                                <div class="form-group md:mx-2">
                                    <label for="about">
                                        Información adicional
                                        <span class="optional">(opcional)</span>
                                    </label>
                                    <div class="mt-1">
                                <textarea id="about"
                                          class="lp-input"
                                          rows="5"
                                          v-model="veterinaryForm.about"
                                >@{{ veterinaryForm.about }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0 mb-4"></div>
                        </div>

                    </form>
                </template>
                <template #footer>
                    <button @click="closeModal()" type="button"
                            class="lp-btn">
                        Cancelar
                    </button>
                    <button @click="update"
                            :disabled="isLoading"
                            class="lp-btn-success">
                        Actualizar
                    </button>
                </template>
            </modal>

        </div>
    </veterinary-profile>
@endsection


