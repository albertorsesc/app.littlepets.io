<template>

    <div>
        <form @submit.prevent>
            <div class="space-y-4 ">
                <div v-if="! postTypeTab" class="w-full md:w-2/3 lg:-mx-2 lg:flex lg:justify-between lg:justify-center align-middle items-center">
<!--                    <div @click="postTypeTab = 'owner'"
                         class="lg:mx-2 bg-white shadow sm:rounded-md h-32 w-full text-center items-center align-middle rounded-lg shadow-md py-4 px-6 text-2xl font-medium cursor-pointer"
                         :class="[postTypeTab === 'owner' ? 'border-2 border-cyan-200 text-cyan-400' : 'text-gray-700 border border-gray-200 hover:bg-gray-50 hover:text-cyan-400 hover:font-semibold hover:shadow-inner']">
                        <span class="items-center align-middle my-auto">Dueños buscando su mascota</span>
                    </div>
                    <div @click="postTypeTab = 'rescuer'"
                         class="lg:mx-2 bg-white shadow sm:rounded-md h-32 w-full text-center items-center align-middle rounded-lg shadow-md py-4 px-6 text-2xl font-medium cursor-pointer"
                         :class="[postTypeTab === 'rescuer' ? 'border-2 border-cyan-200 text-cyan-400' : 'text-gray-700 border border-gray-200 hover:bg-gray-50 hover:text-cyan-400 hover:font-semibold hover:shadow-inner']">
                        <span class="items-center align-middle my-auto">Encontre una mascota</span>
                    </div>-->

                    <!--Owner-->
                    <div @click="postTypeTab = 'owner'"
                         class="lg:mx-2 bg-white shadow-lg rounded-xl cursor-pointer hover:bg-gray-50 active:bg-gray-50 active:shadow-inner hover:shadow-inner transition hover:transform active:transform">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Dueños buscando su mascota
                            </h3>
                            <div class="mt-2 sm:flex sm:items-start sm:justify-between">
                                <div class="max-w-xl text-sm text-gray-500">
                                    <p>
                                        Si tienes una mascota extraviada, elige esta opción para publicar sus datos.
                                        Mantendremos los ojos abiertos.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Rescuer-->
                    <div @click="postTypeTab = 'rescuer'"
                         class="mt-8 lg:mt-0 lg:mx-2 bg-white shadow-lg rounded-xl cursor-pointer hover:bg-gray-50 active:bg-gray-50 active:shadow-inner hover:shadow-inner transition hover:transform active:transform">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Rescate una mascota
                            </h3>
                            <div class="mt-2 sm:flex sm:items-start sm:justify-between">
                                <div class="max-w-xl text-sm text-gray-500">
                                    <p>
                                        Si rescataste una mascota extraviada o en situación de calle, elige esta opción
                                        para ayudarl@ a regresar a casa o encontrar un hogar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div v-if="postTypeTab" class="w-full lg:w-2/3 bg-white shadow rounded-md">
                    <div class="py-4 px-4 md:px-10">
                        <div  v-if="postTypeTab === 'owner'">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Dueño
                            </h3>
                            <p class="mt-1 text-justify text-sm text-gray-500 w-full md:w-3/5">
                                Esta Información nos ayudara a conocer las características básicas de tu
                                mascota para que toda la comunidad pueda reconocerlo.
                            </p>
                        </div>
                        <div  v-if="postTypeTab === 'rescuer'">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Rescatista
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 w-full md:w-3/5">
                                Esta Información nos ayudara a conocer las características básicas de tu
                                mascota para que toda la comunidad pueda reconocerlo.
                            </p>
                        </div>

                        <!--Form Fields-->
                        <div class="mt-4 grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Me llamo:</label>
                                <input type="text"
                                       v-model="lostPetForm.pet.name"
                                       id="name"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p v-if="errors.name"
                                   v-text="errors.name[0]"
                                   class="text-red-500 font-medium"
                                ></p>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="specie_id" class="block text-sm font-medium text-gray-700">Especie</label>
                                <select id="specie_id"
                                        v-model="lostPetForm.pet.specie"
                                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option v-for="specie in species"
                                            :key="specie.id"
                                            :value="specie"
                                            v-text="specie.display_name"
                                    ></option>
                                </select>
                                <p v-if="errors.specie_id"
                                   v-text="errors.specie_id[0]"
                                   class="text-red-500 font-medium"
                                ></p>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="country" class="block text-sm font-medium text-gray-700">Genero:</label>
                                <select id="country"
                                        v-model="lostPetForm.pet.gender"
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
                                <label for="age" class="block text-sm font-medium text-gray-700">Mi Edad:</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <label for="age_range" class="sr-only">Age range</label>
                                        <select id="age_range"
                                                v-model="lostPetForm.pet.ageRange"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-3 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md"
                                                :class="errors.age_range ? 'border-2 border-red-400' : ''">
                                            <option value="días">Días</option>
                                            <option value="semanas">Semanas</option>
                                            <option value="meses">Meses</option>
                                            <option value="años" selected>Años</option>
                                        </select>
                                    </div>
                                    <input type="number"
                                           v-model="lostPetForm.pet.age"
                                           id="age"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-28 sm:text-sm border-gray-300 rounded-md"
                                           :class="errors.age ? 'border-2 border-red-400' : ''">
                                </div>
                                <p v-if="errors.age"
                                   v-text="errors.age[0]"
                                   class="text-red-500 font-medium"
                                ></p>
                                <p v-if="errors.age_range"
                                   v-text="errors.age_range[0]"
                                   class="text-red-500 font-medium"
                                ></p>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="size" class="block text-sm font-medium text-gray-700">De Tamaño</label>
                                <select id="size"
                                        v-model="lostPetForm.pet.size"
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

                            <div v-if="postTypeTab === 'owner'" class="col-span-6 sm:col-span-2">
                                <label for="lost_at" class="block text-sm font-medium text-gray-700">
                                    Me perdi el (Fecha y hora de extravio)
                                </label>
                                <input type="datetime-local"
                                       v-model="lostPetForm.lostAt"
                                       id="lost_at"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p v-if="errors.lost_at"
                                   v-text="errors.lost_at[0]"
                                   class="text-red-500 font-medium"
                                ></p>
                            </div>

                            <div v-if="postTypeTab === 'rescuer'" class="col-span-6 sm:col-span-2">
                                <label for="rescued_at" class="block text-sm font-medium text-gray-700">
                                    Me encontraron el (Fecha y hora de rescate)
                                </label>
                                <input type="datetime-local"
                                       v-model="lostPetForm.rescuedAt"
                                       id="rescued_at"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p v-if="errors.rescued_at"
                                   v-text="errors.rescued_at[0]"
                                   class="text-red-500 font-medium"
                                ></p>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <div>
                                    <label for="bio" class="block text-sm font-medium text-gray-700">
                                        Cualquier otra Información puede ser de gran ayuda
                                    </label>
                                    <div class="mt-1">
                                <textarea id="bio"
                                          v-model="lostPetForm.bio"
                                          rows="3"
                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"
                                          :placeholder="[lostPetForm.pet.name ? `${lostPetForm.pet.name} tiene una mancha en el ojo izquierdo y ...` : '']"
                                ></textarea>
                                    </div>
                                    <p v-if="lostPetForm.pet.name" class="mt-2 text-sm text-gray-500">
                                        Cuéntanos lo mas relevante de {{ lostPetForm.pet.name }}.
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

            </div>
        </form>
    </div>

</template>

<script>
export default {
    name: "CreateLostPet",
    data() {
        return {
            species: [],

            lostPetForm: {
                pet: {},
                title: '',
                phone: '',
                description: '',
                lostAt: '',
                rescuedAt: '',
            },

            postTypeTab: '',

            isLoading: false,
            errors: [],
        }
    },
    methods: {
        store() {
            this.isLoading = true
            axios.post('/lost-pets', {
                specie_id: this.lostPetForm.pet.specie ? this.lostPetForm.pet.specie.id : null,
                name: this.lostPetForm.pet.name,
                gender: this.lostPetForm.pet.gender,
                size: this.lostPetForm.pet.size,
                age: this.lostPetForm.pet.age,
                age_range: this.lostPetForm.pet.ageRange,
                title: this.lostPetForm.title,
                post_type: this.postTypeTab,
                phone: this.lostPetForm.phone,
                description: this.lostPetForm.description,
                lost_at: this.lostPetForm.lostAt,
                rescued_at: this.lostPetForm.rescuedAt,
            })
                .then(response => {
                    window.Event.$emit('lost-pet-form:store', response.data)
                    this.isLoading = false
                    this.lostPetForm = {pet: {}}
                    this.postTypeTab = ''
                    this.errors = []
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
    },
    created() {
        this.getSpecies()
    }
}
</script>
