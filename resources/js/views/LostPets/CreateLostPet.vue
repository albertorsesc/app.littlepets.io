<template>

    <form @submit.prevent>
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-4 px-4 space-y-4 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Registra tu mascota extraviada por favor
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 w-3/5">
                        Esta informacion nos ayudara a conocer las caracteristicas basicas de tu
                        mascota para que toda la comunidad pueda reconocerlo.
                    </p>
                </div>

                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Me llamo:</label>
                        <input type="text"
                               v-model="lostPetForm.name"
                               id="name"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p v-if="errors.name"
                           v-text="errors.name[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="specie_id" class="block text-sm font-medium text-gray-700">Soy un:</label>
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
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="breed_id" class="block text-sm font-medium text-gray-700">De la Raza:</label>
                        <select v-model="lostPetForm.breed"
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
                        <label for="country" class="block text-sm font-medium text-gray-700">Soy:</label>
                        <select id="country"
                                v-model="lostPetForm.gender"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="female">Chica (hembra)</option>
                            <option value="male">Chico (macho)</option>
                        </select>
                        <p v-if="errors.gender"
                           v-text="errors.gender[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="age" class="block text-sm font-medium text-gray-700">Mi edad es de:</label>
                        <input type="number"
                               v-model="lostPetForm.age"
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
                                v-model="lostPetForm.size"
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="Miniatura">Miniatura</option>
                            <option value="Pequeno">Pequeno</option>
                            <option value="Mediano">Mediano</option>
                            <option value="Grande">Grande</option>
                        </select>
                        <p v-if="errors.size"
                           v-text="errors.size[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Contacto</label>
                        <input type="text"
                               v-model="lostPetForm.phone"
                               id="phone"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p v-if="errors.phone"
                           v-text="errors.phone[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700">
                                Cualquier otra informacion puede ser de gran ayuda
                            </label>
                            <div class="mt-1">
                                <textarea id="bio"
                                          v-model="lostPetForm.bio"
                                          rows="3"
                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"
                                          :placeholder="`${lostPetForm.name} tiene una mancha en el ozo izquierdo y ...`"
                                ></textarea>
                            </div>
                            <p v-if="lostPetForm.name" class="mt-2 text-sm text-gray-500">
                                Cuéntanos lo mas relevante de {{ lostPetForm.name }}.
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
                    Guardar
                </button>
            </div>
        </div>
    </form>

</template>

<script>
export default {
    name: "CreateLostPet",
    data() {
        return {
            species: [],
            breeds: [],

            lostPetForm: {
                breed: {},
                name: '',
                gender: '',
                size: '',
                age: 0,
                bio: '',
                description: '',
            },
            selectedSpecie: {},

            isLoading: false,
            errors: [],
        }
    },
    methods: {
        store() {
            this.isLoading = true
            axios.post('/lost-pets', {
                breed_id: this.lostPetForm.breed ? this.lostPetForm.breed.id : null,
                name: this.lostPetForm.name,
                gender: this.lostPetForm.gender,
                size: this.lostPetForm.size,
                age: this.lostPetForm.age,
                phone: this.lostPetForm.phone,
                description: this.lostPetForm.description,
            })
                .then(response => {
                    window.Event.$emit('lost-pet-form:store', response.data.data)
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
            axios.get('/species')
                .then(response => {
                    this.species = response.data.data
                })
                .catch(error => console.log(error))
        },
        getBreedsBySpecie() {
            axios.get(`/species/${this.selectedSpecie.id}/breeds`)
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
