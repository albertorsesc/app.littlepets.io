<template>
    <div class="bg-red-300 my-4 w-full px-3 flex flex-col">
        <div class="card transition hover:transform">
            <img src="https://images.unsplash.com/photo-1526489550178-7bd5d9944f4f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=663&q=80" alt="" class="object-fit pointer-events-none group-hover:opacity-75">
            <!--            <custom-carousel :images="property.images" module-name="properties" :size="'small'"></custom-carousel>-->
        </div>
        <div class="px-4 -mt-16 relative">
            <div class="card transition hover:transform px-6 py-2">
                <div class="flex justify-center items-center align-middle">
                    <!--                    <span class="bg-teal-200 text-teal-700 font-semibold text-xs rounded-full px-2 py-1 tracking-wide leading-none inline-block"
                                              v-if="property.location"
                                              v-text="property.location.state.name"
                                              :title="property.location.state.name"
                                        ></span>-->
                    <span class="mr-4 bg-blue-200 text-teal-700 font-semibold text-xs rounded-full px-2 py-1 tracking-wide leading-none inline-block"
                    >Algo</span>
                    <span class="bg-purple-200 text-teal-700 font-semibold text-xs rounded-full px-2 py-1 tracking-wide leading-none inline-block"
                    >Algo</span>
                </div>
                <div class="font-semibold text-lg text-gray-700 mt-2 text-center"
                >Algo</div>

                <div class="text-sm md:text-xs py-1">
                    <div class="flex justify-center items-center">
                        <span>Algo</span>

                        <span class="mx-2">&bullet;</span>

                        <span>
                            Algo
                        </span>
                    </div>
                </div>

                <div class="mb-1 text-center align-middle -mt-2">
                    <span class="text-green-700 font-bold text-base">Algo</span>
                    <span class="ml-1 text-sm text-gray-500">m.n.</span>
                </div>

                <hr>

                <div class="flex justify-center align-middle items-center">

                    <a class="inline-block text-gray-700 hover:shadow-lg hover:text-indigo-500 tracking-wide text-sm font-bold mr-2 align-middle items-center"
                       target="_blank"
                       title="Compartir">
                        <i class="fab fa-facebook text-blue-500 text-lg"></i>
                    </a>
                    <div class="mt-1 ml-2 right-0 items-center align-middle">
                        <a class="lp-link flex no-underline text-sm font-medium text-gray-300 hover:text-emerald-400"
                           title="Ver Propiedad">
                            Ver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AdoptionCard',
    props: {
        adoption: {
            required: true,
            type: Object,
        },
    },
    data() {
        return {
            currentUrl: window.location.href,

            adoptionTitle: this.adoption.title,
        }
    },
    components: {
    }
}
</script>
