<template>

    <form @submit.prevent>
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Registra una Organizacion</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Registra los datos básicos y accede al perfil de tu Organizacion, una vez dentro podras continuar con el resto de la información
                        necesaria...
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
                                   v-model="organizationForm.name"
                                   id="name"
                                   class="lp-input"
                                   :class="errors.name ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.name"
                           v-text="errors.name[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Type-->
                    <div class="col-span-6 md:col-span-2">
                        <label for="type" class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Tipo de Refugio
                        </label>
                        <div class="mt-2">
                            <select v-model="organizationForm.type" id="type" class="lp-select">
                                <option v-for="(type, index) in organizationTypes"
                                        :key="index"
                                        :value="type"
                                        v-text="type"
                                ></option>
                            </select>
                        </div>
                        <p v-if="errors.type"
                           v-text="errors.type[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Phone-->
                    <div class="col-span-6 md:col-span-2">
                        <label for="phone" class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Teléfono
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="organizationForm.phone"
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
                    <div class="col-span-6 md:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Correo Electrónico
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-2">
                            <input type="email"
                                   v-model="organizationForm.email"
                                   id="email"
                                   class="lp-input"
                                   :class="errors.email ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.email"
                           v-text="errors.email[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Capacity-->
                    <div class="col-span-6 md:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            <strong class="required">*</strong>
                            Capacidad
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="organizationForm.capacity"
                                   id="capacity"
                                   class="lp-input"
                                   :class="errors.capacity ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.capacity"
                           v-text="errors.capacity[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <!--Facebook-->
                    <div class="col-span-6 md:col-span-3">
                        <label for="facebook_profile" class="block text-sm font-medium text-gray-700">
                            Perfil de Facebook
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="organizationForm.facebookProfile"
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
                    <div class="col-span-6 md:col-span-3">
                        <label for="site" class="block text-sm font-medium text-gray-700">
                            Sitio Web
                            <span class="optional">(opcional)</span>
                        </label>
                        <div class="mt-2">
                            <input type="text"
                                   v-model="organizationForm.site"
                                   id="site"
                                   class="lp-input"
                                   :class="errors.site ? 'border-2 border-red-400' : ''">
                        </div>
                        <p v-if="errors.site"
                           v-text="errors.site[0]"
                           class="text-red-500 font-medium"
                        ></p>
                    </div>

                    <div class="col-span-6 ">
                        <div>
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Acerca de Nosotros
                                <span class="optional">(opcional)</span>
                            </label>
                            <div class="mt-1">
                                <textarea id="about"
                                          v-model="organizationForm.about"
                                          rows="4"
                                          class="lp-input"
                                ></textarea>
                            </div>
                            <p v-if="organizationForm.name" class="mt-2 text-sm text-gray-500">
                                Cuéntanos mas {{ organizationForm.name }} para que la comunidad de LittlePets los conozcan.
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
import VueMultiselect from 'vue-multiselect'

export default {
    name: "CreateOrganization",
    data() {
        return {
            organizationForm: {
                name: '',
                type: '',
                phone: '',
                email: '',
                facebookProfile: '',
                site: '',
                capacity: '',
                about: '',
            },
            organizationTypes: [],

            isLoading: false,
            errors: [],
        }
    },
    methods: {
        store() {
            this.isLoading = true
            axios.post('/organizations', {
                name: this.organizationForm.name,
                type: this.organizationForm.type,
                phone: this.organizationForm.phone,
                email: this.organizationForm.email,
                facebook_profile: this.organizationForm.facebookProfile,
                site: this.organizationForm.site,
                capacity: this.organizationForm.capacity,
                about: this.organizationForm.about,
            })
            .then(response => {
                window.Event.$emit('organization-form:store', response.data.data)
                this.isLoading = false
                this.organizationForm = {}
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
        getOrganizationTypes() {
            axios.get('/organization-types')
            .then(response => {
                this.organizationTypes = response.data.data
            })
            .catch(error => {
                console.log(error)
            })
        },
    },
    created() {
        this.getOrganizationTypes()
    },
    components: {
        VueMultiselect,
    },
}
</script>
