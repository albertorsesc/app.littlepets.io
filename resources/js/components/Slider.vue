<template>
    <div v-cloak v-if="isOpen" class="fixed inset-0 overflow-hidden" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">
            <!-- Background overlay, show/hide based on slide-over state. -->
            <div v-if="isOpen" @click="close" class="absolute inset-0" aria-hidden="true"></div>

            <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">
                <transition name="slider" :duration="1500" appear>
                    <div v-if="isOpen" class="w-screen max-w-md transform transition-all">
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
                                                :images="data.pet.images"
                                                :module-name="'adoptions'"
                                                :size="'medium'"
                                            ></custom-carousel>
    <!--                                        <img class="absolute h-full w-full object-cover" src="https://images.unsplash.com/photo-1550469434-2e20fe65dad1?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1052&q=80" alt="">-->
                                        </div>
                                        <div class="mt-12 sm:mt-8 md:mt-6 px-4 sm:flex sm:items-end sm:px-6">
                                            <div class="sm:flex-1">
                                                <div>
                                                    <div class="flex items-center">
                                                        <h3 class="font-bold text-xl text-gray-900 sm:text-2xl">
                                                            Hola, soy
                                                            <span class="text-cyan-500">{{ data.pet.name }}</span>
                                                        </h3>
                                                    </div>
                                                    <p class="text-sm text-gray-500" v-text="data.title"></p>
                                                </div>
                                                <div class="mt-5 flex flex-wrap space-y-3 sm:space-y-0 sm:space-x-3">
    <!--                                                <button type="button" class="flex-shrink-0 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-900 bg-gray-100 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:flex-1">
                                                        Message
                                                    </button>-->
                                                    <a :href="data.meta.profile"
                                                       type="button"
                                                       class="flex-1 w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Mas Información
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 pt-5 pb-5 sm:px-0 sm:pt-0">

                                    <dl class="space-y-8 px-4 sm:px-6 sm:space-y-6">
                                        <div>
                                            <h3 class="font-medium text-gray-900">Datos Básicos</h3>
                                            <dl class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                                                <div class="py-3 flex justify-between text-sm font-medium">
                                                    <dt class="text-gray-500">Genero:</dt>
                                                    <dd class="text-gray-900"
                                                        v-text="data.pet.gender === 'male' ? 'Chico' : 'Chica'"
                                                    ></dd>
                                                </div>
                                                <div class="py-3 flex justify-between text-sm font-medium">
                                                    <dt class="text-gray-500">Soy de tamaño:</dt>
                                                    <dd class="text-gray-900" v-text="data.pet.size"></dd>
                                                </div>
                                                <div class="py-3 flex justify-between text-sm font-medium">
                                                    <dt class="text-gray-500">Edad</dt>
                                                    <div class="flex">
                                                        <dd class="mr-1 text-gray-900" v-text="data.pet.age"></dd>
                                                        <dd class="text-gray-900" v-text="data.pet.ageRange"></dd>
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
                                                <div class="py-3 flex justify-between text-sm font-medium">
                                                    <dt class="text-gray-500">Acerca de mi:</dt>
                                                    <dd class="text-gray-900" v-text="data.bio"></dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'Slider',
    data() {
        return {
            data: {},
            isOpen: false,
        }
    },
    methods: {
        open() {
            window.Event.$emit('slider:open')
        },
        close() {
            window.Event.$emit('slider:close')
        },
    },
    mounted() {
        window.Event.$on('slider:open', data => {
            this.data = data
            this.isOpen = true
        })
        window.Event.$on('slider:close', () => {
            this.isOpen = false
        })
    },
    components: {
        CustomCarousel: () => import(/* webpackChunkName: "custom-carousel" */ './CustomCarousel'),
    }
}
</script>
