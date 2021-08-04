<template>
    <div v-cloak v-if="isOpen" class="fixed inset-0 overflow-hidden" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">
            <!-- Background overlay, show/hide based on slide-over state. -->
            <div v-if="isOpen" @click="close" class="absolute inset-0" aria-hidden="true"></div>

            <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">
                <!--
                  Slide-over panel, show/hide based on slide-over state.

                  Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                    From: "translate-x-full"
                    To: "translate-x-0"
                  Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                    From: "translate-x-0"
                    To: "translate-x-full"
                -->
                <div v-if="isOpen" class="w-screen max-w-md">
                    <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                        <div class="px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between">
<!--                                <h2 id="slide-over-heading" class="text-lg font-medium text-gray-900">
                                    Profile
                                </h2>-->
                                <div class="ml-3 h-7 flex items-center">
                                    <button @click="close" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:ring-2 focus:ring-indigo-500">
                                        <span class="sr-only">Close panel</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Main -->
                        <div>
                            <div class="pb-1 sm:pb-6">
                                <div>
                                    <div class="relative h-40 sm:h-56">
                                        <custom-carousel
                                            :images="localAdoption.pet.images"
                                            :module-name="'adoptions'"
                                            :size="'medium'"
                                        ></custom-carousel>
<!--                                        <img class="absolute h-full w-full object-cover" src="https://images.unsplash.com/photo-1550469434-2e20fe65dad1?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1052&q=80" alt="">-->
                                    </div>
                                    <div class="mt-6 px-4 sm:mt-8 sm:flex sm:items-end sm:px-6">
                                        <div class="sm:flex-1">
                                            <div>
                                                <div class="flex items-center">
                                                    <h3 class="font-bold text-xl text-gray-900 sm:text-2xl">
                                                        Hola, me soy
                                                        <span class="text-cyan-500">{{ localAdoption.pet.name }}</span>
                                                    </h3>
                                                </div>
                                                <p class="text-sm text-gray-500" v-text="localAdoption.title"></p>
                                            </div>
                                            <div class="mt-5 flex flex-wrap space-y-3 sm:space-y-0 sm:space-x-3">
<!--                                                <button type="button" class="flex-shrink-0 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-900 bg-gray-100 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:flex-1">
                                                    Message
                                                </button>-->
                                                <a :href="localAdoption.meta.profile"
                                                   type="button"
                                                   class="flex-1 w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Mas informacion
                                                </a>
                                                <span class="ml-3 inline-flex sm:ml-0">
                        <div class="relative inline-block text-left">
                          <button type="button" class="inline-flex items-center p-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-400 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open options menu</span>
                              <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                          </button>

                            <!--
                              Dropdown panel, show/hide based on dropdown state.

                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                          <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                              <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                              <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-item-0">View profile</a>
                              <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-item-1">Copy profile link</a>
                            </div>
                          </div>
                        </div>
                      </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="px-4 pt-5 pb-5 sm:px-0 sm:pt-0">

                                <dl class="space-y-8 px-4 sm:px-6 sm:space-y-6">
                                    <div>
                                        <h3 class="font-medium text-gray-900">Información</h3>
                                        <dl class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                                            <div class="py-3 flex justify-between text-sm font-medium">
                                                <dt class="text-gray-500">Genero:</dt>
                                                <dd class="text-gray-900"
                                                    v-text="localAdoption.pet.gender === 'male' ? 'Chico' : 'Chica'"
                                                ></dd>
                                            </div>
                                            <div class="py-3 flex justify-between text-sm font-medium">
                                                <dt class="text-gray-500">Soy de tamano:</dt>
                                                <dd class="text-gray-900" v-text="localAdoption.pet.size"></dd>
                                            </div>
                                            <div class="py-3 flex justify-between text-sm font-medium">
                                                <dt class="text-gray-500">Edad</dt>
                                                <div class="flex">
                                                    <dd class="mr-1 text-gray-900" v-text="localAdoption.pet.age"></dd>
                                                    <dd class="text-gray-900" v-text="localAdoption.pet.ageRange"></dd>
                                                </div>
                                            </div>
                                            <div class="py-3 flex justify-between text-sm font-medium">
                                                <dt class="text-gray-500">Publicado:</dt>
                                                <dd class="text-gray-900">hace 2 dias</dd>
                                            </div>
                                            <div class="py-3 flex justify-between text-sm font-medium">
                                                <dt class="text-gray-500">Actualizado:</dt>
                                                <dd class="text-gray-900">hace 2 dias</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'SlideOver',
    data() {
        return {
            localAdoption: {},
            isOpen: false,
        }
    },
    methods: {
        open() {
            window.Event.$emit('adoption-slider:open')
        },
        close() {
            window.Event.$emit('adoption-slider:close')
        },
    },
    mounted() {
        window.Event.$on('adoption-slider:open', adoption => {
            this.localAdoption = adoption
            this.isOpen = true
        })
        window.Event.$on('adoption-slider:close', () => {
            this.isOpen = false
        })
    },
    components: {
        CustomCarousel: () => import(/* webpackChunkName: "custom-carousel" */ '../CustomCarousel'),
    }
}
</script>
