<template>
    <div>
        <div class="w-full md:w-2/3 mb-4">
            <!--Mobile-->
            <div class="sm:hidden">
                <label for="post-type-tab" class="sr-only">Select a tab</label>
                <select id="post-type-tab" name="tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    <option selected>Perros</option>

                    <option>Gatos</option>

                    <option>Roedores</option>

                    <option>Otras Especies</option>
                </select>
            </div>
            <!--Desktop-->
            <div class="hidden sm:block">
                <nav class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">
                    <button @click="switchPostTypeTab('owner')"
                            class="text-gray-900 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="postTypeTab === 'owner' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                            aria-current="page">
                        <span>Perdidos</span>
                        <span v-if="postTypeTab === 'owner'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>

                    <button @click="switchPostTypeTab('rescuer')"
                            class="group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="postTypeTab === 'rescuer' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span>Encontrados</span>
                        <span v-if="postTypeTab === 'rescuer'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>
                </nav>
            </div>
        </div>
        <div class="w-full md:w-2/3">
            <!--Mobile-->
            <div class="sm:hidden">
                <label for="species-tab" class="sr-only">Select a tab</label>
                <select id="species-tab" name="tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    <option selected>Perros</option>

                    <option>Gatos</option>

                    <option>Roedores</option>

                    <option>Otras Especies</option>
                </select>
            </div>
            <!--Desktop-->
            <div class="hidden sm:block">
                <nav class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">
                    <button @click="switchSpeciesTab('dog')"
                            class="text-gray-900 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'dog' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                            aria-current="page">
                        <span>Perros</span>
                        <span v-if="speciesTab === 'dog'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>

                    <button @click="switchSpeciesTab('cat')"
                            class="group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'cat' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span>Gatos</span>
                        <span v-if="speciesTab === 'cat'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>

                    <button @click="switchSpeciesTab('rodent')"
                            class="group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'rodent' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span>Roedores</span>
                        <span v-if="speciesTab === 'rodent'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>

                    <button @click="switchSpeciesTab('other')"
                            class="group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'other' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span>Otras Especies</span>
                        <span v-if="speciesTab === 'other'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>
                </nav>
            </div>
        </div>

        <ul role="list"
            class="w-full lg:w-2/3 lg:flex lg:flex-wrap">
            <li v-for="lostPet in filteredLostPets"
                :key="lostPet.id"
                class="relative py-4 w-full 2xl:w-1/2 px-3">
                <a :href="lostPet.meta.profile">
                    <pet-card :pet="lostPet"></pet-card>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "ExploreLostPets",
    data() {
        return {
            lostPets: [],

            filteredLostPets: [],

            speciesTab: 'dog',
            postTypeTab: 'owner'
        }
    },
    methods: {
        index() {
            axios.get('/lost-pets')
            .then(response => {
                this.lostPets = response.data.data
                this.switchPostTypeTab('owner')
                this.switchSpeciesTab('dog')
            }).catch(error => console.log(error))
        },
        switchPostTypeTab(postType) {
            this.postTypeTab = postType
            this.filteredLostPets = this.lostPets.filter(lostPet => {
                return lostPet.postType === this.postTypeTab
            })
            this.switchSpeciesTab('dog')
        },
        switchSpeciesTab(specie) {
            this.speciesTab = specie
            if (this.speciesTab === 'other') {
                this.filteredLostPets = this.lostPets.filter(lostPet => {
                    return lostPet.postType === this.postTypeTab &&
                        lostPet.pet.breed.specie.name !== 'dog' &&
                        lostPet.pet.breed.specie.name !== 'cat' &&
                        lostPet.pet.breed.specie.name !== 'rodent'
                })
            } else {
                this.filteredLostPets = this.lostPets.filter(lostPet => {
                    return lostPet.postType === this.postTypeTab &&
                        lostPet.pet.breed.specie.name === this.speciesTab
                })
            }
        },
    },
    created() {
        this.index()
    },
    components: {
        PetCard: () => import(/* webpackChunkName: "pet-card" */ '../../components/PetCard'),
    }
}
</script>

<style scoped>

</style>
