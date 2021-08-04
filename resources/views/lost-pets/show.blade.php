@extends('layouts.app')

@section('title', e($lostPet->title))

@section('content')
    <lost-pet-profile :lost-pet="{{ json_encode($lostPet) }}"  inline-template>
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
                                        <h1 v-if="localLostPet.postType === 'owner'"
                                            class="ml-3 text-2xl font-medium leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                            Hola mi nombre es <span class="text-cyan-500 font-bold">@{{ localLostPet.pet.name }}</span>, me haz visto?
                                        </h1>
                                        <h1 v-if="localLostPet.postType === 'rescuer'"
                                            class="ml-3 text-2xl font-medium leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                            Hola! Podrian ayudarme a encontrar a mi humano? por favor
                                        </h1>
                                        <dl class="flex flex-col sm:ml-3 sm:flex-row sm:flex-wrap">
                                            <dd v-if="localLostPet.title"
                                                class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                                                <i class="fas fa-bullhorn mr-2"></i>
                                                <span v-text="localLostPet.title" class="text-gray-600 text-base font-semibold"></span>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex items-center align-middle mr-48 align-middle md:-mb-8 md:space-x-3 md:mt-0">
                                <span class="rounded-md shadow-sm">
                                    <button type="button"
                                            class="btn btn-primary -mt-1 items-center flex shadow-sm justify-center w-full px-10 py-3 border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-600 bg-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800"
                                            title="Hacer publico esta Publicación...">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-400 hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                                        </svg>
                                        <span v-if="! localLostPet.meta.foundAt" class="ml-2 text-base">
                                            Marcar @{{ localLostPet.pet.name }} como Encontrad@!
                                        </span>
                                        <span v-else
                                              class="ml-2 text-base">
                                            @{{ localLostPet.pet.name }} ha sido Encontrad@!
                                        </span>
                                    </button>
                                </span>

                                <button @click="onDelete"
                                        class="inline-flex items-center justify-center px-3 py-3 bg-white border border-gray-200 border border-gray-200 rounded-md shadow-sm font-medium text-base text-gray-700 transition ease-in-out duration-150 -mt-2"
                                        title="Eliminar Publicación">
                                    <svg class="text-red-500 hover:text-red-600" width="25" height="25"  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                                {{--Report--}}
                                <report :model-id="localLostPet.id" model-name="lost-pets" inline-template>
                                    <div>
                                        <button @click="openModal('report')"
                                                class="inline-flex items-center justify-center px-3 py-3 bg-white border border-gray-200 border border-gray-200 rounded-md shadow-sm font-medium text-base text-gray-700 transition ease-in-out duration-150 -mt-2"
                                                title="Reportar Publicación...">
                                            <svg class="text-yellow-500 hover:text-yellow-600" width="25" height="25" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                        </button>
                                        <modal modal-id="reports" max-width="sm:max-w-md">
                                            <template #title>Reportar Publicación</template>
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
                                                                    @foreach(\App\Models\LostPets\LostPet::getReportingCauses() as $key => $reportingCause)
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
                                                        type="button" class="btn">
                                                    Cancelar
                                                </button>
                                                <button @click="submitReport"
                                                        class="btn btn-primary">
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

            <main class="w-full">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="w-full md:w-2/3 py-6 sm:px-0">
                        <div>
                            <div class="w-full mb-2 md:flex mt-4">
                                <div class="md:hidden">
                                    <div class="flex justify-end md:hidden mx-2 md:-mx-3 mt-1 mb-2">
                                        {{--Publish/Unpublish--}}
                                        <div class="w-full md:w-1/3 mx-2 md:mx-3 mb-2 md:mb-0">
                                        <span class="rounded-md shadow-sm">
                                            <button @click="toggle"
                                                    :disabled="isLoading"
                                                    type="button"
                                                    class="-mt-1 flex shadow-sm justify-center w-full py-3 border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800"
                                                    title="Hacer publica esta Publicación...">
                                                <span class="text-green-300 hover:text-green-400">Publicar</span>
                                            </button>
                                        </span>
                                        </div>

                                        {{--Update Property--}}
                                        <div class="w-full md:w-1/3 mx-2 md:mx-3">
                                        <span class="rounded-md shadow-sm">
                                            <button @click="openModal('put')"
                                                    type="button"
                                                    class="-mt-1 items-center shadow-sm w-full py-3 flex justify-center border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800"
                                                    title="Actualizar Datos de la Publicación...">
                                                <span class="text-gray-300">Editar</span>
                                            </button>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <!--Carrousel-->
                                <div class="w-full md:w-2/3 md:mr-4 mb-2 my-4">
                                    <div class="card transition hover:transform">
                                        <div class="card-body">
                                            <custom-carousel
                                                :images="localLostPet.images"
                                                :module-name="'lost-pets'"
                                                :size="'medium'"
                                            ></custom-carousel>
                                        </div>
                                    </div>

                                </div>

                                <div class="w-full md:w-1/3 mt-4">
                                    <div class="hidden md:flex md:justify-between md:-mx-2 mt-1 mb-2">
                                        {{--Publish/Unpublish--}}
                                        <div class="w-full md:w-1/2 md:mx-2 mb-2 md:mb-0">
                                            <span class="rounded-md shadow-sm">
                                                <button @click="toggle"
                                                        type="button"
                                                        :class="[status.btnClass]"
                                                        class="-mt-1 flex shadow-sm justify-center w-full py-3 border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800"
                                                        :title="localLostPet.meta.publishedAt ? 'Ocultar esta Publicación...' : 'Hacer publica esta Publicación...'">
                                                        <span v-if="! localLostPet.meta.publishedAt" class="text-green-300 hover:text-green-400">Publicar</span>
                                                        <span v-if="localLostPet.meta.publishedAt" class="text-gray-300 hover:text-gray-400">Ocultar</span>
                                                    </button>
                                            </span>
                                        </div>

                                        {{--Update Property--}}
                                        <div class="w-full md:w-1/2 md:mx-2">
                                <span class="rounded-md shadow-sm">
                                    <button @click="openModal('put')"
                                            type="button"
                                            class="-mt-1 items-center shadow-sm w-full py-3 flex justify-center border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800"
                                            title="Actualizar Datos de la Publicación...">
                                        <span class="text-gray-300">Editar</span>
                                    </button>
                                </span>
                                        </div>
                                    </div>

                                    {{--Specs List--}}
                                    <div class="md:flex md:justify-between mb-2">
                                        <div class="w-full bg-white shadow-sm overflow-hidden sm:rounded-md h-auto">
                                            <ul>
                                                {{--Status--}}
                                                <li class="mt-2" title="Estatus de la Publicación">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Estatus de Publicación
                                                                </div>
                                                                <div v-if="localLostPet.meta.publishedAt"
                                                                     class="ml-2 flex-shrink-0 flex">
                                                                    <svg class="h-5 w-5 text-green-500"  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                                    <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500">Publicado</span>
                                                                </div>
                                                                <div v-else
                                                                     class="ml-2 flex-shrink-0 flex">
                                                                    <svg class="h-5 w-5 text-gray-500"  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                                                    <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500">No Publicado</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{--Situation--}}
                                                <li class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Situacion
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                    <span v-if="localLostPet.meta.foundAt"
                                                                          class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500">
                                                                        Encontrad@
                                                                    </span>
                                                                    <span v-else
                                                                          class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500">
                                                                        Sin Encontrar
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{--Breed--}}
                                                <li class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Raza
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500"
                                                                      v-text="localLostPet.pet.breed.name"
                                                                ></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{--Gender--}}
                                                <li class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Genero
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                    <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500"
                                                                          v-if="localLostPet.pet.gender === 'male'">
                                                                        Chico (macho)
                                                                    </span>
                                                                    <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500"
                                                                          v-if="localLostPet.pet.gender === 'female'">
                                                                        Chica (hembra)
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{--Size--}}
                                                <li class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Tamaño
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500"
                                                                      v-text="localLostPet.pet.size"
                                                                ></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{--Age--}}
                                                <li v-if="localLostPet.postType === 'owner'"
                                                    class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Edad
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500">
                                                                    @{{ localLostPet.pet.age }} @{{ localLostPet.pet.ageRange }}
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{--Found--}}
                                                <li v-show="localLostPet.meta.foundAt" class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Encontrado
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500">
                                                                    <p v-show="localLostPet.meta.foundAt" v-text="localLostPet.meta.foundAt"></p>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{--Rescued--}}
                                                <li v-show="localLostPet.meta.rescuedAt && localLostPet.postType === 'rescuer'"
                                                    class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Rescatado
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500">
                                                                    <p v-show="localLostPet.meta.rescuedAt" v-text="localLostPet.meta.rescuedAt"></p>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{--Published--}}
                                                <li v-show="localLostPet.meta.publishedAt"
                                                    class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Publicado
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500">
                                                                    <p v-text="localLostPet.meta.publishedAt"></p>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{--Updated--}}
                                                <li class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Actualizado
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                <span v-text="localLostPet.meta.updatedAt"
                                                                      class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500"
                                                                ></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{--Description--}}
                        <div v-if="localLostPet.description"
                             class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                    <div v-if="localLostPet.description" class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Información adicional...
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900" v-text="localLostPet.description"></dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <div>
                            <lost-pet-images></lost-pet-images>
                        </div>

                        <lost-pet-location></lost-pet-location>

                        {{--Comments--}}
                        <divider title="Comentarios"></divider>
                        <section aria-labelledby="notes-title" class="mt-6">
                            <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                                    <div class="flex space-x-3">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <form @submit.prevent>
                                                <div>
                                                    <label for="comment" class="sr-only">Comments</label>
                                                    <textarea id="comment"
                                                              v-model="selectedComment.body"
                                                              rows="3"
                                                              class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md"
                                                              placeholder="Anade un comentario"
                                                    ></textarea>
                                                    <p v-if="errors.body"
                                                       v-text="errors.body[0]"
                                                       class="text-red-500 font-medium"
                                                    ></p>
                                                </div>
                                                <div class="mt-3 flex items-center justify-between">
                                                    <a href="#" class="md:-mt-8 group inline-flex items-start text-sm space-x-2 text-gray-500 hover:text-gray-900">
                                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                        </svg>
                                                        <span>
                                                            Seamos respetuosos con los demas, todos queremos lo mejor para estos angelitos.
                                                        </span>
                                                    </a>
                                                    <button v-if="updatingComment"
                                                            @click="updateComment"
                                                            type="submit"
                                                            class="btn">
                                                        Actualizar
                                                    </button>
                                                    <button v-else
                                                            @click="comment"
                                                            type="submit"
                                                            class="btn">
                                                        Comentar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <div class="px-4 py-6 sm:px-6">
                                        <ul id="comment-list"
                                            class="space-y-4 h-auto overflow-y-auto"
                                            :class="localLostPet.comments.length > 5 ? 'h-96' : 'h-auto'">
                                            <li v-if="! localLostPet.comments.length">Sin comentarios</li>
                                            <li v-for="comment in localLostPet.comments"
                                                :key="comment.id">
                                                <div class="flex space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                    </div>
                                                    <div>
                                                        <div class="text-sm">
                                                            <a href="#" class="font-medium text-gray-900"
                                                                v-text="comment.user.first_name"
                                                            ></a>
                                                        </div>
                                                        <div class="mt-1 text-sm text-gray-700">
                                                            <p v-text="comment.body"></p>
                                                        </div>
                                                        <div class="mt-2 text-sm space-x-2">
                                                            <span class="text-gray-500 font-medium"
                                                                  v-text="comment.updatedAt"
                                                            ></span>
                                                            <span class="text-gray-500 font-medium">&middot;</span>
                                                            <button @click="onUpdateComment(comment)"
                                                                    type="button"
                                                                    class="text-gray-900 font-medium">
                                                                Editar
                                                            </button>
                                                            <button @click="onDeleteComment(comment)"
                                                                    type="button"
                                                                    class="text-gray-900 font-medium">
                                                                Eliminar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </main>

            <modal modal-id="update-lost-pet" max-width="sm:max-w-5xl">
                <template #title>Actualizar Datos de la Adopción</template>
                <template #content>
                    <form @submit.prevent>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <div class="w-full md:mx-2">
                                <div class="form-group">
                                    <label for="title">
                                        Titulo de la Publicación
                                        <span class="text-gray-500 font-light text-xs">(opcional)</span>
                                    </label>
                                    <div class="mt-2">
                                        <input type="text" id="title" v-model="lostPetForm.title" class="lp-input">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="name">
                                        Nombre
                                        <span class="text-gray-500 font-light text-xs">(opcional)</span>
                                    </label>
                                    <div class="mt-2">
                                        <input type="text" id="name" v-model="lostPetForm.pet.name" class="lp-input">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="specie_id">
                                        <strong class="required">*</strong>
                                        Especie
                                        <span class="text-gray-500 font-light text-xs">(requerido)</span>
                                    </label>
                                    <div class="mt-2">
                                        <select v-model="selectedSpecie"
                                                @change="getBreedsBySpecie(selectedSpecie)"
                                                id="specie_id"
                                                class="lp-select">
                                            <option v-text="selectedSpecie.display_name" selected disabled></option>
                                            <option v-for="specie in species"
                                                    :key="specie.id"
                                                    :value="specie"
                                                    v-text="specie.display_name"
                                            ></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="breed_id">
                                        <strong class="required">*</strong>
                                        Raza o Similar
                                        <span class="text-gray-500 font-light text-xs">(requerido)</span>
                                    </label>
                                    <div class="mt-2">
                                        <select v-model="selectedBreed" id="breed_id" class="lp-select">
                                            <option v-text="selectedBreed.name"
                                                    :value="selectedBreed"
                                                    selected disabled
                                            ></option>
                                            <option v-for="breed in breeds"
                                                    :key="breed.id"
                                                    :value="breed"
                                                    v-text="breed.name"
                                            ></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="gender">
                                        <strong class="required">*</strong>
                                        Soy (macho/hembra)
                                        <span class="text-gray-500 font-light text-xs">(requerido)</span>
                                    </label>
                                    <div class="mt-2">
                                        <select v-model="lostPetForm.pet.gender"
                                                id="gender"
                                                class="lp-select">
                                            <option v-if="localLostPet.pet.gender === 'male'" selected disabled>Chico (macho)</option>
                                            <option v-if="localLostPet.pet.gender === 'female'" selected disabled>Chica (hembra)</option>
                                            <option value="male">Chico (macho)</option>
                                            <option value="female">Chica (hembra)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="size">
                                        <strong class="required">*</strong>
                                        Tamaño
                                        <span class="text-gray-500 font-light text-xs">(requerido)</span>
                                    </label>
                                    <div class="mt-2">
                                        <select v-model="lostPetForm.pet.size" id="size" class="lp-select">
                                            <option v-text="localLostPet.pet.size" selected disabled></option>
                                            <option value="Miniatura">Miniatura</option>
                                            <option value="Pequeño">Pequeño</option>
                                            <option value="Mediano">Mediano</option>
                                            <option value="Grande">Grande</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0 mb-4">
                                <div class="form-group">
                                    <label for="age">Mi Edad:</label>
                                    <div class="mt-2 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center">
                                            <label for="age_range" class="sr-only">Age range</label>
                                            <select id="age_range"
                                                    v-model="lostPetForm.pet.ageRange"
                                                    class="focus:ring-cyan-500 focus:border-cyan-500 h-full py-0 pl-3 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md"
                                                    :class="errors.age_range ? 'border-2 border-red-400' : ''">
                                                <option value="días">Días</option>
                                                <option value="semanas">Semanas</option>
                                                <option value="meses">Meses</option>
                                                <option value="años" selected>Años</option>
                                            </select>
                                        </div>
                                        <input type="number"
                                               v-model="lostPetForm.pet.age"
                                               id="age"
                                               class="lp-input pl-28"
                                               :class="errors.age ? 'border-2 border-red-400' : ''">
                                    </div>
                                    <p v-if="errors.age"
                                       v-text="errors.age[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                    <p v-if="errors.age_range"
                                       v-text="errors.age_range[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <div class="form-group">
                                <label for="rescued_at" class="block text-sm font-medium text-gray-700">
                                    Me encontraron el (Fecha y hora de rescate)
                                </label>
                                <input type="datetime-local"
                                       v-model="lostPetForm.rescuedAt"
                                       id="rescued_at"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p v-if="errors.rescued_at"
                                   v-text="errors.rescued_at[0]"
                                   class="text-red-500 font-medium"
                                ></p>
                            </div>
                        </div>

                        <div class="w-full my-6 md:-mx-2 md:mt-0">
                            <div class="form-group md:mx-2">
                                <label for="description">Información Adicional</label>
                                <span class="text-gray-500 font-light text-xs">(opcional)</span>
                                <div class="mt-2">
                                <textarea id="description"
                                          class="block rounded-md shadow-sm w-full outline-none border-emerald-200 bg-gray-100 focus:bg-white border-none"
                                          rows="5"
                                          v-model="lostPetForm.description"
                                >@{{ lostPetForm.description }}</textarea>
                                </div>
                            </div>
                        </div>

                    </form>
                </template>
                <template #footer>
                    <button @click="closeModal"
                            type="button"
                            class="btn">
                        Cancelar
                    </button>
                    <button @click="update"
                            :disabled="isLoading"
                            class="btn btn-primary">
                        Actualizar
                    </button>
                </template>
            </modal>

        </div>
    </lost-pet-profile>
@endsection


