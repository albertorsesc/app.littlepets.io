<template>
    <div>
        <!--Lost/Found-->
        <div class="w-full lg:w-2/3 mb-4">
            <!--Mobile-->
            <div class="sm:hidden">
                <label for="post-type-tab" class="sr-only">Select a tab</label>
                <select id="post-type-tab" v-model="postTypeTab" @change="switchPostTypeTab(postTypeTab)" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    <option value="owner">Perdidos</option>

                    <option value="rescuer">Rescatados</option>
                </select>
            </div>
            <!--Desktop-->
            <div class="hidden sm:block">
                <nav class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">
                    <button @click="switchPostTypeTab('owner')"
                            class="text-gray-900 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="postTypeTab === 'owner' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                            aria-current="page">
                        <span class="mr-2">Perdidos</span>
                        <span v-text="this.lostPets.filter(lostPet => lostPet.postType === 'owner').length"
                              class="text-cyan-400 items-center align-middle"
                        ></span>
                        <span v-if="postTypeTab === 'owner'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>

                    <button @click="switchPostTypeTab('rescuer')"
                            class="group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="postTypeTab === 'rescuer' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span class="mr-2">Encontrados</span>
                        <span v-text="this.lostPets.filter(lostPet => lostPet.postType === 'rescuer').length"
                              class="text-cyan-400 items-center align-middle"
                        ></span>
                        <span v-if="postTypeTab === 'rescuer'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>
                </nav>
            </div>
        </div>
        <!--Species-->
        <div class="w-full lg:w-2/3">
            <!--Mobile-->
            <div class="sm:hidden">
                <label for="species-tab" class="sr-only">Select a tab</label>
                <select id="species-tab" v-model="speciesTab" @change="switchSpeciesTab(speciesTab)" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
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
                        <span class="mr-2">Perros</span>
                        <span v-text="this.lostPets.filter(lostPet => lostPet.pet.specie.name === 'dog' && lostPet.postType === postTypeTab).length"
                              class="text-cyan-400 items-center align-middle"
                        ></span>
                        <span v-if="speciesTab === 'dog'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>

                    <button @click="switchSpeciesTab('cat')"
                            class="group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'cat' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span class="mr-2">Gatos</span>
                        <span v-text="this.lostPets.filter(lostPet => lostPet.pet.specie.name === 'cat' && lostPet.postType === postTypeTab).length"
                              class="text-cyan-400 items-center align-middle"
                        ></span>
                        <span v-if="speciesTab === 'cat'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>

                    <button @click="switchSpeciesTab('rodent')"
                            class="group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'rodent' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span class="mr-2">Roedores</span>
                        <span v-text="this.lostPets.filter(lostPet => lostPet.pet.specie.name === 'rodent' && lostPet.postType === postTypeTab).length"
                              class="text-cyan-400 items-center align-middle"
                        ></span>
                        <span v-if="speciesTab === 'rodent'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>

                    <button @click="switchSpeciesTab('other')"
                            class="group relative rounded-r-lg min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                            :class="speciesTab === 'other' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'">
                        <span>Otras Especies</span>
                        <span v-text="this.lostPets.filter(
                                lostPet => lostPet.pet.specie.name !== 'dog' &&
                                    lostPet.pet.specie.name !== 'cat' &&
                                    lostPet.pet.specie.name !== 'rodent' &&
                                    lostPet.postType === postTypeTab
                             ).length"
                              class="text-cyan-400 items-center align-middle"
                        ></span>
                        <span v-if="speciesTab === 'other'" aria-hidden="true" class="bg-cyan-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                    </button>
                </nav>
            </div>
        </div>

        <ul role="list"
            class="w-full lg:w-2/3 md:flex md:flex-wrap">
            <li v-for="lostPet in filteredLostPets"
                :key="lostPet.id"
                class="relative py-4 w-full md:w-1/2 lg:px-3">
                <a :href="lostPet.meta.profile">
                    <pet-card :data="lostPet" :meta="{ date: lostPet.publishedAt }"></pet-card>
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
                        lostPet.pet.specie.name !== 'dog' &&
                        lostPet.pet.specie.name !== 'cat' &&
                        lostPet.pet.specie.name !== 'rodent'
                })
            } else {
                this.filteredLostPets = this.lostPets.filter(lostPet => {
                    return lostPet.postType === this.postTypeTab &&
                        lostPet.pet.specie.name === this.speciesTab
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
