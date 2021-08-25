<template>

    <form @submit.prevent>
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Registra un Refugio</h3>
                    <p class="mt-1 text-sm text-gray-500">Cuéntanos...</p>
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Refugio</label>
                        <input type="text"
                               v-model="shelterForm.name"
                               id="name"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p v-if="errors.name"
                           v-text="errors.name[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text"
                               v-model="shelterForm.phone"
                               id="phone"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p v-if="errors.phone"
                           v-text="errors.phone[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="specie_id" class="block text-sm font-medium text-gray-700">Servicios</label>
                        <select id="specie_id"
                                v-model="selectedSpecie"
                                @change="getBreedsBySpecie"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option v-for="specie in species"
                                    :key="specie.id"
                                    :value="specie"
                                    v-text="specie.display_name"
                            ></option>
                        </select>
                        <p v-if="errors.name"
                           v-text="errors.name[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="breed_id" class="block text-sm font-medium text-gray-700">De la Raza:</label>
                        <select v-model="shelterForm.breed"
                                id="breed_id"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option v-for="breed in breeds"
                                    :key="breed.id"
                                    :value="breed"
                                    v-text="breed.name"
                            ></option>
                        </select>
                        <p v-if="errors.breed_id"
                           v-text="errors.breed_id[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="age" class="block text-sm font-medium text-gray-700">Mi edad es de:</label>
                        <input type="number"
                               v-model="shelterForm.age"
                               id="age"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p v-if="errors.age"
                           v-text="errors.age[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="size" class="block text-sm font-medium text-gray-700">De Tamaño</label>
                        <select id="size"
                                v-model="shelterForm.size"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="Miniatura">Miniatura</option>
                            <option value="Pequeño">Pequeño</option>
                            <option value="Mediano">Mediano</option>
                            <option value="Grande">Grande</option>
                        </select>
                        <p v-if="errors.size"
                           v-text="errors.size[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="country" class="block text-sm font-medium text-gray-700">Y soy:</label>
                        <select id="country"
                                v-model="shelterForm.gender"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="hembra">Chica (hembra)</option>
                            <option value="macho">Chico (macho)</option>
                        </select>
                        <p v-if="errors.gender"
                           v-text="errors.gender[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6">
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700">
                                Cuéntanos sobre
                            </label>
                            <div class="mt-1">
                                <textarea id="bio"
                                          v-model="shelterForm.bio"
                                          rows="3"
                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"
                                          :placeholder="`${shelterForm.name} es muy carinoso y ...`"
                                ></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Cuéntanos sobre {{ shelterForm.name }} y que le gusta hacer.
                            </p>
                        </div>
                    </div>

                    <div class="col-span-6">
                        <div>
                            <label for="story" class="block text-sm font-medium text-gray-700">
                                Su Historia
                            </label>
                            <div class="mt-1">
                                <textarea id="story"
                                          v-model="shelterForm.story"
                                          rows="3"
                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"
                                          :placeholder="`Cuéntanos un poco sobre la historia de ${shelterForm.name}.`"
                                ></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Si quieres puedes compartirnos un poco de la historia de {{ shelterForm.name }} para conocerl@ mejor.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="px-6 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                        @click="store"
                        :disabled="isLoading"
                        class="btn text-lg font-medium hover:bg-cyan-500 hover:text-white hover:font-semibold">
                    Save
                </button>
            </div>
        </div>
    </form>

</template>

<script>
export default {
    name: "AdoptionForm",
    data() {
        return {
            species: [],
            breeds: [],

            shelterForm: {
                title: '',
                breed: {},
                name: '',
                size: '',
                age: 0,
                bio: '',
                story: '',
            },
            selectedSpecie: {},

            isLoading: false,
            errors: [],
        }
    },
    methods: {
        store() {
            this.isLoading = true
            axios.post('api/adoptions', {
                breed_id: this.shelterForm.breed ? this.shelterForm.breed.id : null,
                title: this.shelterForm.title,
                name: this.shelterForm.name,
                size: this.shelterForm.size,
                age: this.shelterForm.age,
                bio: this.shelterForm.bio,
                story: this.shelterForm.story,
            })
                .then(response => {
                    window.Event.$emit('adoption-form:store', response.data.data)
                    this.isLoading = false
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    } else {
                        this.errors = []
                    }
                    this.isLoading = false
                })
        },
        getSpecies() {
            axios.get('api/species')
                .then(response => {
                    this.species = response.data.data
                })
                .catch(error => console.log(error))
        },
        getBreedsBySpecie() {
            axios.get(`api/species/${this.selectedSpecie.id}/breeds`)
                .then(response => {
                    this.breeds = response.data.data
                })
                .catch(error => console.log(error))
        },
    },
    created() {
        this.getSpecies()
    }
}
</script>

<style scoped>

</style>
