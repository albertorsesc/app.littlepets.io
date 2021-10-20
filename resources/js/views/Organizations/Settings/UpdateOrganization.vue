<template>

    <form class="divide-y divide-gray-200 lg:col-span-9" action="#" method="POST">
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div>
                <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                <p class="mt-1 text-sm text-gray-500">
                    This information will be displayed publicly so be careful what you share.
                </p>
            </div>

            <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">
                            Nombre de la Organizacion
                        </label>
                        <div class="mt-1 rounded-md shadow-sm flex">
                            <input type="text" name="username" id="username" autocomplete="username" class="lp-input" value="deblewis">
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Telefono</label>
                            <div class="mt-1 rounded-md shadow-sm flex">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="lp-input">
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Correo Electronico</label>
                            <div class="mt-1 rounded-md shadow-sm flex">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="lp-input">
                            </div>
                        </div>
                    </div>
                </div>

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
                                    <input id="mobile-user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden relative rounded-full overflow-hidden lg:block">
                        <img class="relative rounded-full w-40 h-40" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                        <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                            <span>Change</span>
                            <span class="sr-only"> user photo</span>
                            <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Enlace de Facebook hacia la pagina de la Organizacion</label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="lp-input">
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Enlace hacia el sitio web de la Organizacion</label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="lp-input">
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="company" class="block text-sm font-medium text-gray-700">Capacidad de la Organizacion</label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                    <input type="text" name="company" id="company" autocomplete="organization" class="lp-input">
                    </div>
                </div>
            </div>
        </div>
        <!--                            <div class="pt-6 divide-y divide-gray-200">
                                    </div>-->
    </form>

</template>

<script>
import VueMultiselect from 'vue-multiselect'

export default {
    name: "CreateVeterinary",
    data() {
        return {
            organizationForm: {
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
                name: this.organizationForm.name,
                services: this.organizationForm.services,
                specialty: this.organizationForm.specialty,
                phone: this.organizationForm.phone,
                email: this.organizationForm.email,
                is_open_at_night: this.organizationForm.isOpenAtNight,
                facebook_profile: this.organizationForm.facebookProfile,
                site: this.organizationForm.site,
                about: this.organizationForm.about,
            })
            .then(response => {
                window.Event.$emit('veterinary-form:store', response.data.data)
                this.isLoading = false
                this.organizationForm = {pet: {}}
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
