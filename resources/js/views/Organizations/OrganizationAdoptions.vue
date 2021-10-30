<template>
    <main class="py-10">
        <!-- Page header -->
        <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:space-x-5 lg:max-w-7xl lg:px-8"></div>

        <div class="mt-0 max-w-3xl lg:max-w-5xl grid grid-cols-1 gap-6 sm:px-6 lg:grid-flow-col-dense lg:grid-cols-3">
            <div class="space-y-6 lg:col-start-1 lg:col-span-4">
                <section aria-labelledby="applicant-information-title">
                    <div class="flex items-center align-middle space-x-5">
                        <div class="items-center flex justify-start" v-cloak>
                            <button class="lp-btn">
                                <span >Registra una nueva adopción</span>
                            </button>
                        </div>
                    </div>
                </section>

                <section aria-labelledby="organization-location">
                </section>
            </div>

<!--            <section v-if="localVeterinary.user.id === auth"
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
                &lt;!&ndash; Activity Feed &ndash;&gt;
                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                    <h2 id="timeline-title" class="text-lg font-medium text-gray-900">
                        Actividad reciente
                    </h2>
                    &#45;&#45;}}{{&#45;&#45;<div class="mt-6 flow-root">
                    <ul role="list" class="-mb-8">
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                                                      <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                                                        &lt;!&ndash; Heroicon name: solid/user &ndash;&gt;
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
                        &lt;!&ndash; Heroicon name: solid/thumb-up &ndash;&gt;
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
                        &lt;!&ndash; Heroicon name: solid/check &ndash;&gt;
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
                        &lt;!&ndash; Heroicon name: solid/thumb-up &ndash;&gt;
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
                        &lt;!&ndash; Heroicon name: solid/check &ndash;&gt;
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
                </div>&#45;&#45;}}{{&#45;&#45;
                    <div class="mt-6 flex flex-col justify-stretch">
                    </div>
                </div>
            </section>-->
        </div>
    </main>
</template>

<script>
export default {
    name: "OrganizationAdoptions",
    data() {
        return {
        }
    },
    components: {
        // CreateAdoption: () => import(/* webpackChunkName: "create-adoption" */ '../../views/Adoptions/CreateAdoption'),
    }
}
</script>

<style scoped>

</style>
