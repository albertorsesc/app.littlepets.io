<template>

    <form class="divide-y divide-gray-200 lg:col-span-9" @submit.prevent enctype="multipart/form-data">
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div>
                <h2 class="text-lg leading-6 font-medium text-gray-900">Datos de mi {{ organization.type }}</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Actualiza los datos de tu Organizacion y manten tu informacion al dia para llegar a mas personas en LittlePets.
                </p>
            </div>

            <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Nombre de la Organizacion
                        </label>
                        <div class="mt-1 flex">
                            <span class="text-lg font-medium text-cyan-500" v-text="organizationForm.name"></span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Telefono</label>
                            <div class="mt-1 rounded-md shadow-sm flex">
                                <input type="text" v-model="organizationForm.phone" id="phone" class="lp-input">
                            </div>
                            <p v-if="errors.phone"
                               v-text="errors.phone[0]"
                               class="text-red-500 font-medium"
                            ></p>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electronico</label>
                            <div class="mt-1 rounded-md shadow-sm flex">
                            <input type="text" v-model="organizationForm.email" id="email" autocomplete="given-name" class="lp-input">
                            </div>
                            <p v-if="errors.email"
                               v-text="errors.email[0]"
                               class="text-red-500 font-medium"
                            ></p>
                        </div>
                    </div>
                </div>

                <!--Logo-->
                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                    <div class="mt-1 lg:hidden">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                                <img class="rounded-full h-full w-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                            </div>
                            <div class="ml-5 rounded-md shadow-sm">
                                <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                                    <label for="mobile-user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                        <span>Change</span>
                                        <span class="sr-only"> user photo</span>
                                    </label>
                                    <input id="mobile-user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden relative rounded-full overflow-hidden lg:block">
                        <img class="relative rounded-full w-40 h-40" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                        <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                            <span>Change</span>
                            <span class="sr-only"> user photo</span>
                            <input type="file"
                                   id="desktop-user-photo"
                                   @change="handleImage($event)"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6">
                    <label for="facebook_profile" class="block text-sm font-medium text-gray-700">Enlace de Facebook hacia la pagina de la Organizacion</label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                        <input type="text" v-model="organizationForm.facebookProfile" id="facebook_profile" class="lp-input">
                    </div>
                    <p v-if="errors.facebook_profile"
                       v-text="errors.facebook_profile[0]"
                       class="text-red-500 font-medium"
                    ></p>
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="site" class="block text-sm font-medium text-gray-700">Enlace hacia el sitio web de la Organizacion</label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                        <input type="text" v-model="organizationForm.site" id="site" class="lp-input">
                    </div>
                    <p v-if="errors.site"
                       v-text="errors.site[0]"
                       class="text-red-500 font-medium"
                    ></p>
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="capacity" class="block text-sm font-medium text-gray-700">Capacidad de la Organizacion</label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                    <input type="text" v-model="organizationForm.capacity" id="capacity" autocomplete="organization" class="lp-input">
                    </div>
                    <p v-if="errors.capacity"
                       v-text="errors.capacity[0]"
                       class="text-red-500 font-medium"
                    ></p>
                </div>

                <div class="col-span-12">
                    <label for="about" class="block text-sm font-medium text-gray-700">Acerca de {{ localOrganization.name }}</label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                        <textarea v-model="organizationForm.about"
                                  id="about"
                                  class="lp-input"
                                  rows="8"
                                  v-text="organizationForm.about"
                        ></textarea>
                    </div>
                    <p v-if="errors.about"
                       v-text="errors.about[0]"
                       class="text-red-500 font-medium"
                    ></p>
                </div>
            </div>
            <div class="mt-6 flex justify-end items-center align-middle">
                <button @click="update" type="button" class="lp-btn-success">Actualizar</button>
            </div>
        </div>
        <!--                            <div class="pt-6 divide-y divide-gray-200">
                                    </div>-->
    </form>

</template>

<script>
import VueMultiselect from 'vue-multiselect'
import SweetAlert from "../../../models/SweetAlert";

export default {
    name: "UpdateOrganization",
    inject: ['organization'],
    data() {
        return {
            localOrganization: this.organization,
            organizationForm: {},

            isLoading: false,
            errors: [],
        }
    },
    methods: {
        update() {
            this.isLoading = true
            axios.put(`/organizations/${this.organization.slug}`, {
                type: this.organizationForm.type,
                phone: this.organizationForm.phone,
                email: this.organizationForm.email,
                facebook_profile: this.organizationForm.facebookProfile,
                site: this.organizationForm.site,
                capacity: this.organizationForm.capacity,
                about: this.organizationForm.about,
                logo: this.organizationForm.logo,
            })
            .then(response => {
                window.Event.$emit('organization-form:update', response.data.data)
                this.isLoading = false
                this.errors = []
                SweetAlert.success(`Tu Organizacion ha sido actualizada existosamente!`)
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
        handleImage(event) {
            let file = event.target.files[0]
            let reader = new FileReader()
            let vm = this
            reader.onloadend = (file) => {
                vm.organizationForm.logo = reader.result
            }
            reader.readAsDataURL(file)

            /*axios.put(`/businesses/${this.localBusiness.slug}/image`, {
                logo: this.logo
            }).then(response => {
                dd(response)
            }).catch(error => dd(error))*/
        },
        onLoad() {
            this.organizationForm.name = this.localOrganization.name
            this.organizationForm.type = this.localOrganization.type
            this.organizationForm.phone = this.localOrganization.phone
            this.organizationForm.email = this.localOrganization.email
            this.organizationForm.facebookProfile = this.localOrganization.facebookProfile
            this.organizationForm.site = this.localOrganization.site
            this.organizationForm.capacity = this.localOrganization.capacity
            this.organizationForm.about = this.localOrganization.about

            window.Event.$on('organization-form:update', (organization) => {
                this.localOrganization = this.organizationForm = organization
            })
        },
    },
    components: {
        VueMultiselect,
    },
    created() {
        this.onLoad()
    }
}
</script>
