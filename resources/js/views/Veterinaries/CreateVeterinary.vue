<template>

    <form @submit.prevent>
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Registra una Veterinaria</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Registra los datos básicos y accede al perfil de tu Veterinaria para continuar con el resto de la información
                        necesaria para encontrar tu clínica...
                    </p>
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <!--Name-->
                    <div class="col-span-6">
                        <label for="name" class="block md:flex-none text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Nombre
                            <span class="truncate text-xs text-gray-500 font-medium ml-2">El Nombre no puede ser cambiado después de guardado.</span>
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="veterinaryForm.name"
                                   id="name"
                                   class="lp-input"
                                   :class="errors.name ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.name"
                           v-text="errors.name[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Services-->
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-2">
                        <label for="services" class="block text-sm font-medium text-gray-700">
                            Servicios
                            <strong class="required">*</strong>
                        </label>
                        <div class="mt-2">
                            <vue-multiselect v-model="veterinaryForm.services"
                                             value="Object"
                                             :placeholder="''"
                                             :options="veterinaryServices"
                                             :multiple="true"
                                             :taggable="true"
                                             :hide-selected="true"
                                             id="services"
                                             :searchable="true"
                                             :close-on-select="false"
                                             select-label=""
                                             selected-label=""
                                             deselect-label=""
                                             :tag-placeholder="''"
                                             placeholder="Selecciona los servicios que se ofrecen..."
                            ></vue-multiselect>
                        </div>
                        <p v-if="errors.services"
                           v-text="errors.services[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Specialty-->
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-2">
                        <label for="specialty" class="block text-sm font-medium text-gray-700">
                            Especialidad
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="veterinaryForm.specialty"
                                   id="specialty"
                                   class="lp-input"
                                   :class="errors.specialty ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.specialty"
                           v-text="errors.specialty[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Phone-->
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-2">
                        <label for="phone" class="block text-sm font-medium text-gray-700">
                            Teléfono
                            <strong class="required">*</strong>
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="veterinaryForm.phone"
                                   id="phone"
                                   class="lp-input"
                                   :class="errors.phone ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.phone"
                           v-text="errors.phone[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Email-->
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Correo Electrónico
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="veterinaryForm.email"
                                   id="email"
                                   class="lp-input"
                                   :class="errors.email ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.email"
                           v-text="errors.email[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Facebook-->
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-2">
                        <label for="facebook_profile" class="block text-sm font-medium text-gray-700">
                            Perfil de Facebook
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="veterinaryForm.facebookProfile"
                                   id="facebook_profile"
                                   class="lp-input"
                                   :class="errors.facebook_profile ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.facebook_profile"
                           v-text="errors.facebook_profile[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Site-->
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-2">
                        <label for="site" class="block text-sm font-medium text-gray-700">
                            Sitio Web
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="veterinaryForm.site"
                                   id="site"
                                   class="lp-input"
                                   :class="errors.site ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.site"
                           v-text="errors.site[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--OpenAtNight-->
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-2">
                        <div class="relative flex items-start items-center mt-2">
                            <div class="flex items-center h-5">
                                <input id="is_open_at_night"
                                       aria-describedby="is_open_at_night_description"
                                       v-model="veterinaryForm.isOpenAtNight"
                                       type="checkbox"
                                       class="focus:ring-cyan-500 h-6 w-6 text-cyan-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_open_at_night" class="font-medium text-gray-700">
                                    Abierto 24hr?
                                    <p id="is_open_at_night_description" class="text-gray-500">
                                        Seleccione la casilla si su clínica esta abierta 24 horas por lo menos 3 dias a la semana.
                                    </p>
                                </label>
                            </div>
                        </div>
                        <p v-if="errors.is_open_at_night"
                           v-text="errors.is_open_at_night[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 sm:col-span-4 md:col-span-6 lg:col-span-4">
                        <div>
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Comentarios
                                <span class="optional">(opcional)</span>
                            </label>
                            <div class="mt-1">
                                <textarea id="about"
                                          v-model="veterinaryForm.about"
                                          rows="4"
                                          class="lp-input"
                                ></textarea>
                            </div>
<!--                            <p v-if="veterinaryForm.pet.name" class="mt-2 text-sm text-gray-500">
                                Cuéntanos sobre {{ veterinaryForm.pet.name }} y que le gusta hacer.
                            </p>-->
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
import VueMultiselect from 'vue-multiselect'

export default {
    name: "CreateVeterinary",
    data() {
        return {
            veterinaryForm: {
                name: '',
                services: [],
                specialty: '',
                phone: '',
                email: '',
                isOpenAtNight: false,
                facebookProfile: '',
                site: '',
                about: '',
            },
            veterinaryServices: [],

            isLoading: false,
            errors: [],
        }
    },
    methods: {
        store() {
            this.isLoading = true
            axios.post('/veterinaries', {
                name: this.veterinaryForm.name,
                services: this.veterinaryForm.services,
                specialty: this.veterinaryForm.specialty,
                phone: this.veterinaryForm.phone,
                email: this.veterinaryForm.email,
                is_open_at_night: this.veterinaryForm.isOpenAtNight,
                facebook_profile: this.veterinaryForm.facebookProfile,
                site: this.veterinaryForm.site,
                about: this.veterinaryForm.about,
            })
            .then(response => {
                window.Event.$emit('veterinary-form:store', response.data.data)
                this.isLoading = false
                this.veterinaryForm = {pet: {}}
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
        getVeterinaryServices() {
            axios.get('/veterinary-services')
                .then(response => {
                    this.veterinaryServices = response.data.data
                })
                .catch(error => console.log(error))
        },
    },
    components: {
        VueMultiselect,
    },
    created() {
        this.getVeterinaryServices()
    }
}
</script>

<style scoped>

</style>
