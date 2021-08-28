<template>
    <div>
        <div class="w-full lg:w-2/3">
            <!--Mobile-->
            <div class="sm:hidden">
                <label for="tabs" class="sr-only">Select a tab</label>
                <select id="tabs" v-model="speciesTab" @change="switchSpeciesTab(speciesTab)" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    <option value="dog">Perros</option>

                    <option value="cat">Gatos</option>

                    <option value="rodent">Roedores</option>

                    <option value="other">Otras Especies</option>
                </select>
            </div>
            <!--Desktop-->
            <div class="hidden sm:block">
                <nav class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">
                    <button @click="switchSpeciesTab('dog')"
                            class="text-gray-900 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'dog' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                            aria-current="page">
                        <span class="flex justify-center items-center">
                            <span class="mr-2">Perros</span>
                            <span v-text="this.adoptions.filter(adoption => adoption.pet.specie.name === 'dog').length"
                                  class="text-cyan-400 items-center align-middle"
                            ></span>
                            <span v-if="speciesTab === 'dog'"
                                  aria-hidden="true"
                                  class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"
                            ></span>
                        </span>
                    </button>

                    <button @click="switchSpeciesTab('cat')"
                            class="group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'cat' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span class="flex justify-center items-center">
                            <span class="mr-2">Gatos</span>
                            <span v-text="this.adoptions.filter(adoption => adoption.pet.specie.name === 'cat').length"
                                  class="text-cyan-400 items-center align-middle"
                            ></span>
                            <span v-if="speciesTab === 'cat'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                        </span>
                    </button>

                    <button @click="switchSpeciesTab('rodent')"
                            class="group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'rodent' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                            <span class="flex justify-center items-center">
                                <span class="mr-2">Roedores</span>
                                <span v-text="this.adoptions.filter(adoption => adoption.pet.specie.name === 'rodent').length"
                                      class="text-cyan-400 items-center align-middle"
                                ></span>
                                <span v-if="speciesTab === 'rodent'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                            </span>
                    </button>

                    <button @click="switchSpeciesTab('other')"
                            class="group relative min-w-0 rounded-r-lg flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'other' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span class="flex justify-center items-center">
                            <span class="mr-2">Otras Especies</span>
                            <span v-text="this.adoptions.filter(
                                adoption => adoption.pet.specie.name !== 'dog' &&
                                    adoption.pet.specie.name !== 'cat' &&
                                    adoption.pet.specie.name !== 'rodent'
                             ).length"
                                  class="text-cyan-400 items-center align-middle"
                            ></span>
                            <span v-if="speciesTab === 'other'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                        </span>
                    </button>
                </nav>
            </div>
        </div>

        <ul v-if="filteredAdoptions.length > 0"
            role="list"
            class="w-full lg:w-2/3 md:flex md:flex-wrap" v-cloak>
            <li v-for="adoption in filteredAdoptions"
                :key="adoption.id"
                @click="openAdoptionSlider(adoption)"
                class="relative py-4 w-full md:w-1/2 lg:px-3">
                <pet-card :data="adoption"
                          :meta="{ date: adoption.meta.publishedAt }"
                ></pet-card>
            </li>
        </ul>
        <!--Banner-->
        <div v-else class="w-full lg:w-2/3 my-4 lg:my-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mx-auto flex justify-center">
                    <h2 class="text-gray-700 text-2xl font-medium w-full lg:w-2/3 mb-0 lg:mb-8 text-center lg:text-justify">
                        Registra una <span class="text-cyan-500">adopción</span> en
                        <span class="text-cyan-500">"Mis Adopciones"</span> <br class="hidden md:block">y
                        encontremos un hogar digno para tu mascota.
                    </h2>
                </div>
                <div class="max-w-3xl mx-auto mt-6 md:mt-0">
                    <img src="/img/dog_with_home.svg" class="h-auto md:h-96 w-auto" alt="">
                </div>
            </div>
        </div>
        <slider></slider>
    </div>
</template>

<script>

export default {
    name: "ExploreAdoptions",
    emits: ['slider:open'],
    data() {
        return {
            adoptions: [],
            filteredAdoptions: [],

            speciesTab: 'dog',
        }
    },
    methods: {
        index() {
            axios.get('/adoptions')
                .then(response => {
                    this.adoptions = response.data.data
                    this.switchSpeciesTab('dog')
                })
                .catch(error => console.log(error))
        },
        openAdoptionSlider(adoption) {
            window.Event.$emit('slider:open', adoption)
        },
        switchSpeciesTab(specie) {
            this.speciesTab = specie
            if (this.speciesTab === 'other') {
                this.filteredAdoptions = this.adoptions.filter(adoption => {
                    return adoption.pet.specie.name !== 'dog' &&
                        adoption.pet.specie.name !== 'cat' &&
                        adoption.pet.specie.name !== 'rodent'
                })
            } else {
                this.filteredAdoptions = this.adoptions.filter(
                    adoption => adoption.pet.specie.name === this.speciesTab
                )
            }
        },
    },
    created() {
        this.index()

        window.Event.$on('adoption-form:store', adoption => {
            this.adoptions.unshift(adoption)
            this.isFormShown = false
        })
    },
    components: {
        Slider: () => import(/* webpackChunkName: "slider" */ '../../components/Slider'),
        PetCard: () => import(/* webpackChunkName: "pet-card" */ '../../components/PetCard'),
    }
}
</script>

<style scoped>

</style>
