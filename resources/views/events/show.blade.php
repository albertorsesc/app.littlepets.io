@extends('layouts.app')

@section('title', e($event->title))

@section('styles')
    <link rel="stylesheet" href="/css/vue-datetime.css">
@endsection

@section('content')

    <event-profile :event="{{ json_encode($event) }}"  inline-template>
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
                                        <h1 class="hidden lg:block lg:ml-3 text-2xl font-medium leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                            <span class="text-cyan-500 font-bold">@{{ localEvent.title }}</span>
                                        </h1>
<!--                                        <h1 class="block lg:hidden lg:ml-3 text-2xl font-medium leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                            Hola! soy <span class="text-cyan-500 font-bold"></span>
                                        </h1>-->
                                    </div>
                                    <dl class="mt-2 lg:mt-2 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                        <dd class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                            </svg>
                                            <span v-text="localEvent.excerpt" class="text-gray-600 text-base font-semibold"></span>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="mt-4 lg:mt-0 md:-mb-8 lg:mr-48 flex justify-end items-center align-middle space-x-2 md:space-x-3">
                                {{--Toggle Event--}}
                                <span v-if="localEvent.user.id === auth"
                                      class="rounded-md shadow-sm md:mr-2">
                                    <button @click="toggle"
                                            type="button"
                                            class="lp-btn"
                                            :title="localEvent.meta.adoptedAt ? 'Marcar mascota como adoptada o disponible' : 'Establecer mascota como Adoptado.' + '...'">
                                        <span v-if="localEvent.meta.adoptedAt"
                                              class="ml-2">
                                            Asistir
                                        </span>
                                        <span v-else
                                              class="ml-2">
                                            No asistire
                                        </span>
                                    </button>
                                </span>
                                {{--Delete--}}
                                <button v-if="localEvent.user.id === auth"
                                        @click="onDelete"
                                        class="md:mr-2 inline-flex items-center justify-center px-3 py-2 bg-white border border-gray-200 border border-gray-200 rounded-md shadow-sm font-medium text-base text-gray-700 transition ease-in-out duration-150"
                                        title="Eliminar Evento">
                                    <svg class="text-red-500 hover:text-red-600" width="25" height="25"  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                                {{--Report--}}
                                <report :model-id="localEvent.uuid" model-name="events" inline-template>
                                    <div>
                                        <button @click="openModal('report')"
                                                class="inline-flex items-center justify-center px-3 py-2 bg-white border border-gray-200 border border-gray-200 rounded-md shadow-sm font-medium text-base text-gray-700 transition ease-in-out duration-150"
                                                title="Reportar Evento...">
                                            <svg class="text-yellow-500 hover:text-yellow-600" width="25" height="25" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                        </button>
                                        <modal modal-id="reports" max-width="sm:max-w-md">
                                            <template #title>Reportar Evento</template>
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
                                                                    @foreach(\App\Models\Events\Event::getReportingCauses() as $key => $reportingCause)
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

            <main class="w-full">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="w-full lg:w-2/3 py-6 sm:px-0">
                        <div>
                            <alert v-if="localEvent.user.id === auth && ! localEvent.location"
                                   :type="'warning'">
                                Para Publicar el Evento es necesario registrar su Dirección
                            </alert>

                            <div class="w-full mb-2 md:flex mt-4">
                                {{--Mobile--}}
                                <div v-if="localEvent.user.id === auth"
                                     class="md:hidden">
                                    <div class="flex justify-end md:hidden mx-2 md:-mx-3 mt-1 mb-2">
                                        {{--Publish/Unpublish--}}
                                        <div v-if="localEvent.location"
                                             class="w-full md:w-1/3 mx-2 md:mx-3 mb-2 md:mb-0"
                                             :class="! localEvent.meta.publishedAt ? 'animate-bounce' : ''">
                                            <span class="rounded-md shadow-sm">
                                                <button @click="toggle"
                                                        :disabled="isLoading"
                                                        type="button"
                                                        class="-mt-1 flex shadow-sm justify-center w-full py-3 border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800"
                                                        :title="localEvent.meta.publishedAt ? 'Ocultar esta Evento del publico...' : 'Hacer publico esta Evento...'">
                                                    <span v-if="localEvent.meta.publishedAt"
                                                          class="text-gray-300"
                                                    >Ocultar</span>
                                                    <span v-else class="text-gray-300">Publicar</span>
                                                </button>
                                            </span>
                                        </div>

                                        {{--Update Event--}}
                                        <div class="w-full md:w-1/3 mx-2 md:mx-3">
                                            <span class="rounded-md shadow-sm">
                                                <button @click="openModal('put')"
                                                        type="button"
                                                        class="-mt-1 items-center shadow-sm w-full py-3 flex justify-center border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800"
                                                        title="Actualizar Datos de la Evento...">
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
                                                :images="localEvent.images"
                                                :module-name="'events'"
                                                :size="'medium'"
                                            ></custom-carousel>
                                        </div>
                                    </div>

                                </div>

                                <div class="w-full md:w-1/3 mt-4">
                                    <div v-if="localEvent.user.id === auth"
                                         class="hidden md:flex md:justify-between md:-mx-2 mt-1 mb-2">
                                        {{--Publish/Unpublish--}}
                                        <div v-if="localEvent.location"
                                             class="w-full md:w-1/2 md:mx-2 mb-2 md:mb-0">
                                            <span class="rounded-md shadow-sm">
                                                <button @click="toggle"
                                                        type="button"
                                                        :class="[status.btnClass, ! localEvent.meta.publishedAt ? 'animate-bounce' : '']"
                                                        class="-mt-1 flex shadow-sm justify-center w-full py-3 border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border focus:border-cyan-300 active:bg-gray-50 active:text-gray-800"
                                                        :title="localEvent.meta.publishedAt ? 'Ocultar esta Evento del publico...' : 'Hacer publico esta Evento...'">
                                                        <span v-if="! localEvent.meta.publishedAt" class="text-gray-300 hover:text-cyan-500">Publicar</span>
                                                        <span v-else class="text-gray-300 hover:text-gray-500">Ocultar</span>
                                                    </button>
                                            </span>
                                        </div>

                                        {{--Update Event--}}
                                        <div class="w-full md:mx-2"
                                             :class="[localEvent.location ? 'md:w-1/2' : 'md:w-full']">
                                            <span class="rounded-md shadow-sm">
                                                <button @click="openModal('put')"
                                                        type="button"
                                                        class="-mt-1 items-center shadow-sm w-full py-3 flex justify-center border border-gray-100 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border focus:border-cyan-300 active:bg-gray-50 active:text-gray-800"
                                                        title="Actualizar Datos de la Evento...">
                                                    <span class="text-gray-300 hover:text-gray-500">Editar</span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>

                                    {{--Specs List--}}
                                    <div class="md:flex md:justify-between mb-2">
                                        <div class="w-full bg-white shadow-sm pb-1 overflow-hidden sm:rounded-md h-auto">
                                            <ul>
                                                <li class="mt-2"
                                                    title="Estatus de la Publicación">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Estatus del Evento
                                                                </div>
                                                                <div v-if="localEvent.meta.publishedAt"
                                                                     class="ml-2 flex-shrink-0 flex">
                                                                    <svg class="h-5 w-5 text-green-500"  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                                    <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500">
                                                                        Publicado
                                                                    </span>
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
                                                <li class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Inicia
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                    <span v-text="toDateTime(localEvent.startsAt)"
                                                                          class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500"
                                                                    ></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Finaliza
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                    <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full text-gray-500"
                                                                          v-text="toDateTime(localEvent.endsAt)"
                                                                    ></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mt-1">
                                                    <div class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                                        <div class="px-4 py-2 sm:px-6">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-base leading-5 font-medium text-gray-600 truncate">
                                                                    Actualizado
                                                                </div>
                                                                <div class="ml-2 flex-shrink-0 flex">
                                                                <span v-text="localEvent.meta.updatedAt"
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

                        {{--Bio and Story--}}
                        <div v-if="localEvent.about"
                             class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                    <div v-if="localEvent.bio" class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Soy un @{{ event.display_name }} que le gusta...
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900" v-text="localEvent.bio"></dd>
                                    </div>
                                    <div v-if="localEvent.story" class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Conoce mi historia
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900" v-text="localEvent.story"></dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <div>
{{--                            <pet-images></pet-images>--}}
                        </div>

{{--                        <event-location></event-location>--}}

                        {{--Comments--}}
                        <divider title="Comentarios"></divider>
                        <section aria-labelledby="notes-title" class="mt-6">
                            <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                                    <div v-if="auth"
                                         class="flex space-x-3">
                                        <div class="hidden md:flex-shrink-0">
                                            <img class="h-8 w-8 rounded-full"
                                                 src="{{ auth()->user()->getAvatar() }}"
                                                 alt="{{ auth()->user()->fullName() }} avatar">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <form @submit.prevent>
                                                <div>
                                                    <label for="comment" class="sr-only">Comments</label>
                                                    <textarea id="comment"
                                                              v-model="selectedComment.body"
                                                              rows="4"
                                                              class="lp-input"
                                                              placeholder="Añade un comentario"
                                                    ></textarea>
                                                    <p v-if="errors.body"
                                                       v-text="errors.body[0]"
                                                       class="text-red-500 font-medium"
                                                    ></p>
                                                </div>
                                                <div class="mt-1 md:mt-3 md:flex items-center justify-between">
                                                    <span class="md:-mt-8 group inline-flex items-start text-sm space-x-2 text-gray-500 hover:text-gray-900">
                                                        Seamos respetuosos con los demás, todos queremos lo mejor para estos angelitos.
                                                    </span>
                                                    <button v-if="updatingComment"
                                                            @click="updateComment"
                                                            type="submit"
                                                            class="lp-btn-success mt-2 w-full md:w-auto">
                                                        Actualizar
                                                    </button>
                                                    <button v-else
                                                            @click="comment"
                                                            type="submit"
                                                            class="lp-btn-success mt-2 w-full md:w-auto">
                                                        Comentar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div v-else
                                         class="flex-space-x-3">
                                        <span>
                                            Debes <a href="{{ route('login') }}">iniciar sesión</a> para comentar en esta publicación.
                                        </span>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <div class="px-4 py-6 sm:px-6">
                                        <ul id="comment-list"
                                            class="space-y-4 h-auto overflow-y-auto"
                                            :class="localEvent.comments.length > 5 ? 'h-96' : 'h-auto'">
                                            <li v-if="! localEvent.comments.length" class="text-center flex justify-center text-gray-400 font-semibold">
                                                Dejanos tus comentarios
                                            </li>
                                            <li v-for="comment in localEvent.comments"
                                                :key="comment.id">
                                                <div class="flex space-x-3 my-2">
                                                    <div class="flex-shrink-0">
                                                        <img class="h-14 w-14 rounded-full"
                                                             src="{{ auth()->user()->getAvatar() }}"
                                                             alt="{{ auth()->user()->fullName() }} avatar">
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
                                                            <span @click="onUpdateComment(comment)"
                                                                  type="button"
                                                                  class="text-gray-600 font-medium cursor-pointer">
                                                                Editar
                                                            </span>
                                                            <span @click="onDeleteComment(comment)"
                                                                  type="button"
                                                                  class="text-gray-600 font-medium cursor-pointer">
                                                                Eliminar
                                                            </span>
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

            <modal v-if="localEvent.user.id === auth" modal-id="update-event" max-width="sm:max-w-5xl">
                <template #title>Actualizar Datos del Evento</template>
                <template #content>
                    <form @submit.prevent>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <div class="w-full md:mx-2">
                                <div class="form-group">
                                    <label for="title">
                                        <strong class="required">*</strong>
                                        Titulo del Evento
                                        <span class="text-gray-500 font-light text-xs">(requerido)</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="title" v-model="eventForm.title" class="lp-input">
                                    </div>
                                    <p v-if="errors.title"
                                       v-text="errors.title[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="starts_at" class="block text-base font-medium text-gray-700">
                                        <strong class="required">*</strong>
                                        Fecha de Inicio
                                    </label>
                                    <div class="mt-1">
                                        <date-time v-model="eventForm.startsAt"
                                                   :data="eventForm.startsAt"
                                        ></date-time>
                                    </div>
                                    <p v-if="errors.starts_at"
                                       v-text="errors.starts_at[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="ends_at"
                                           class="block text-base font-medium text-gray-700">
                                        <strong class="required">*</strong>
                                        Fecha de Finalizacion
                                    </label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <date-time v-model="eventForm.endsAt" :data="eventForm.endsAt"></date-time>
                                    </div>
                                    <p v-if="errors.ends_at"
                                       v-text="errors.ends_at[0]"
                                       class="text-red-500 font-medium"
                                    ></p>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <div class="w-full md:mx-2" >
                                <div class="form-group">
                                    <label for="description">Acerca del Evento</label>
                                    <span class="optional">(opcional)</span>
                                    <div class="mt-1">
                                <textarea id="description"
                                          v-model="eventForm.description"
                                          class="lp-input"
                                          rows="5"
                                ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </template>
                <template #footer>
                    <button @click="closeModal"
                            type="button"
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
    </event-profile>

@endsection
