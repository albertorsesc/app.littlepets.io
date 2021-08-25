<template>

    <form @submit.prevent>
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Registra una Adopción</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Ayudemos a este angelit@ a encontrar un nuevo hogar...
                    </p>
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="title"
                               class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Título de la Publicación
                        </label>
                        <div class="mt-1">
                            <input type="text"
                                   v-model="adoptionForm.title"
                                   id="title"
                                   class="lp-input"
                                   :class="errors.title ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.title"
                           v-text="errors.title[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Me llamo
                        </label>
                        <div class="mt-1">
                            <input type="text"
                                   v-model="adoptionForm.pet.name"
                                   id="name"
                                   class="lp-input"
                                   :class="errors.name ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.name"
                           v-text="errors.name[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="specie_id" class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Especie
                        </label>
                        <div class="mt-1">
                            <select id="specie_id"
                                    v-model="adoptionForm.pet.specie"
                                    class="lp-select">
                                <option v-for="specie in species"
                                        :key="specie.id"
                                        :value="specie"
                                        v-text="specie.display_name"
                                ></option>
                            </select>
                        </div>
                        <p v-if="errors.specie_id"
                           v-text="errors.specie_id[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="country" class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Género
                        </label>
                        <div class="mt-1">
                            <select id="country"
                                    v-model="adoptionForm.pet.gender"
                                    class="lp-select"
                                    :class="errors.gender ? 'border-2 border-red-400' : ''">
                                <option value="female">Chica (hembra)</option>
                                <option value="male">Chico (macho)</option>
                            </select>
                        </div>
                        <p v-if="errors.gender"
                           v-text="errors.gender[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Age-->
                    <div class="col-span-6 sm:col-span-2">
                        <label for="age" class="block text-sm font-medium text-gray-700">
                            Mi Edad
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <label for="age_range" class="sr-only">Age range</label>
                                <select id="age_range"
                                        v-model="adoptionForm.pet.ageRange"
                                        class="focus:ring-cyan-500 focus:border-cyan-500 h-full py-0 pl-3 pr-7 border border-cyan-200 text-gray-500 sm:text-sm rounded-md"
                                        :class="errors.age_range ? 'border-2 border-red-400' : ''">
                                    <option value="días">Días</option>
                                    <option value="semanas">Semanas</option>
                                    <option value="meses">Meses</option>
                                    <option value="años" selected>Años</option>
                                </select>
                            </div>
                            <input type="number"
                                   v-model="adoptionForm.pet.age"
                                   id="age"
                                   class="focus:ring-cyan-500 focus:border-cyan-500 border border-cyan-200 block w-full pl-28 sm:text-sm border-gray-300 rounded-md"
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

                    <!--Size-->
                    <div class="col-span-6 sm:col-span-2">
                        <label for="size" class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            De Tamaño
                        </label>
                        <div class="mt-1">
                            <select id="size"
                                    v-model="adoptionForm.pet.size"
                                    class="lp-select"
                                    :class="errors.size ? 'border-2 border-red-400' : ''">
                                <option value="Miniatura">Miniatura</option>
                                <option value="Pequeño">Pequeño</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Grande">Grande</option>
                            </select>
                        </div>
                        <p v-if="errors.size"
                           v-text="errors.size[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Phone-->
                    <div class="col-span-6 sm:col-span-2">
                        <label for="size" class="block text-sm font-medium text-gray-700">
                            Teléfono
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-1">
                            <input type="text"
                                   v-model="adoptionForm.phone"
                                   id="phone"
                                   class="lp-input"
                                   :class="errors.phone ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.phone"
                           v-text="errors.phone[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6">
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700">
                                Cuéntanos sobre
                                <span class="optional">(opcional)</span>
                            </label>
                            <div class="mt-1">
                                <textarea id="bio"
                                          v-model="adoptionForm.bio"
                                          rows="3"
                                          class="lp-input"
                                ></textarea>
                            </div>
                            <p v-if="adoptionForm.pet.name" class="mt-2 text-sm text-gray-500">
                                Cuéntanos sobre {{ adoptionForm.pet.name }} y que le gusta hacer.
                            </p>
                        </div>
                    </div>

                    <div class="col-span-6">
                        <div>
                            <label for="story" class="block text-sm font-medium text-gray-700">
                                Su Historia
                                <span class="optional">(opcional)</span>
                            </label>
                            <div class="mt-1">
                                <textarea id="story"
                                          v-model="adoptionForm.story"
                                          rows="3"
                                          class="lp-input"
                                ></textarea>
                            </div>
                            <p v-if="adoptionForm.pet.name" class="mt-2 text-sm text-gray-500">
                                Si quieres puedes compartirnos un poco de la historia de {{ adoptionForm.pet.name }} para conocerl@ mejor.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="px-6 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                        @click="store"
                        :disabled="isLoading"
                        class="lp-btn-success">
                    Guardar
                </button>
            </div>
        </div>
    </form>

</template>

<script>
export default {
    name: "CreateAdoption",
    data() {
        return {
            species: [],

            adoptionForm: {
                title: '',
                pet: {},
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
            axios.post('/adoptions', {
                // Pet
                specie_id: this.adoptionForm.pet.specie ? this.adoptionForm.pet.specie.id : null,
                name: this.adoptionForm.pet.name,
                gender: this.adoptionForm.pet.gender,
                size: this.adoptionForm.pet.size,
                age: this.adoptionForm.pet.age,
                age_range: this.adoptionForm.pet.ageRange,

                title: this.adoptionForm.title,
                bio: this.adoptionForm.bio,
                story: this.adoptionForm.story,
            })
                .then(response => {
                    window.Event.$emit('adoption-form:store', response.data.data)
                    this.isLoading = false
                    this.adoptionForm = {pet: {}}
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

<style scoped>

</style>
