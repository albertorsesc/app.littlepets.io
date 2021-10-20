<template>
    <div>
        <div v-if="! currentTeam" class="items-center flex justify-start w-full" v-cloak>
            <button @click="showForm = ! showForm" class="lp-btn py-4">
                <span v-if="! showForm">Registra tu Organizacion</span>
                <span v-if="showForm">Regresar</span>
            </button>
        </div>

        <div v-show="showForm" class="w-full lg:w-2/3 my-8">
            <create-organization></create-organization>
        </div>

        <div v-show="! showForm" v-if="organization.hasOwnProperty('id')" class="-ml-2 mt-6 w-full">
            <div class="w-full lg:w-2/3 ">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between">
                        <h2 class="text-lg leading-6 font-medium text-gray-900">
                            Novedades en <span class="text-cyan-600 text-base font-medium" v-text="organization.name"></span>
                        </h2>
                        <h2 class="text-lg leading-6 font-medium text-gray-900">
                            Ver mi <a :href="organization.meta.profile" class="text-cyan-600 text-base font-medium">Organizacion</a>
                        </h2>
                    </div>
                    <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Card -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: outline/scale -->
                                        <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Capacidad de Animales
                                            </dt>
                                            <dd>
                                                <div class="text-lg font-medium text-gray-900" v-text="organization.capacity"></div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="bg-gray-50 px-5 py-3">
                                <div class="text-sm">
                                    <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900">
                                        View all
                                    </a>
                                </div>
                            </div>-->
                        </div>
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: outline/scale -->
                                        <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Adoptados
                                            </dt>
                                            <dd>
                                                <div class="text-lg font-medium text-gray-900">
                                                    1
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: outline/scale -->
                                        <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Likes
                                            </dt>
                                            <dd>
                                                <div class="text-lg font-medium text-gray-900">
                                                    10
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
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
    name: "MyOrganization",
    data() {
        return {
            organizations: [],
            organization: {},
            organizationServices: [],
            showForm: false
        }
    },
    methods: {
        index() {
            axios.get('/user/organization')
            .then(response => {
                this.organization = response.data.data
            })
            .catch(error => {
                dd(error)
            })
        },
    },
    created() {
        if (this.currentTeam) {
            this.index()
        }

        window.Event.$on('organization-form:store', newOrganization => {
            this.organization = newOrganization
            this.showForm = false
        })
    },
    components: {
        CreateOrganization: () => import(/* webpackChunkName: "create-organization" */ '../../views/Organizations/CreateOrganization'),
    }
}
</script>
