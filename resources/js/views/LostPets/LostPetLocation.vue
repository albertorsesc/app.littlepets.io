<template>
    <div>
        <divider title="Ubicación"></divider>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="flex justify-between px-4 py-5 sm:px-6 items-center">
                <h3 class="flex text-lg leading-6 font-medium text-gray-500">
                    <svg class="mr-2 h-5 w-5 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span v-show="lostPet.postType === 'owner'">Ubicación del Extravío</span>
                    <span v-show="lostPet.postType === 'rescuer'">Ubicación del Rescate</span>
                </h3>
                <div v-if="lostPet.pet.user.id === auth">
                    <button @click="openModal"
                            class="lp-link bg-white -mt-1 shadow rounded-md py-2 px-2 float-left hover:text-cyan-500 focus:outline-none focus:shadow-outline-blue active:bg-cyan-50 active:text-cyan-800"
                            :class="! lostPet.location ? 'animate-bounce' : ''"
                            title="Registrar Ubicación de la Adopción">
                        <svg class="text-cyan-400 hover:text-cyan-600" width="25" height="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div v-if="location" class="border-t border-gray-200 mx-4 py-5 sm:px-6">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-3">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 flex">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            Estado
                        </dt>
                        <dd class="mt-1 text-base text-cyan-600"
                            v-text="location.state.name"
                        ></dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 flex">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            Ciudad
                        </dt>
                        <dd class="mt-1 text-base text-cyan-600"
                            v-text="location.city"
                        ></dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 flex">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            Fraccionamiento/Colonia
                        </dt>
                        <dd class="mt-1 text-base text-cyan-600"
                            v-text="location.neighborhood"
                        ></dd>
                    </div>
                    <div class="sm:col-span-1" v-if="location.address">
                        <dt class="text-sm font-medium text-gray-500 flex">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            Dirección
                        </dt>
                        <dd class="mt-1 text-base text-cyan-600"
                            v-text="location.address"
                        ></dd>
                    </div>
                    <div class="sm:col-span-1" v-if="location.zipCode">
                        <dt class="text-sm font-medium text-gray-500 flex">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            Código Postal
                        </dt>
                        <dd class="mt-1 text-base text-cyan-600"
                            v-text="location.zipCode"
                        ></dd>
                    </div>
                </dl>
            </div>

            <modal v-if="isAuthenticated && lostPet.pet.user.id === auth"
                   modal-id="lost-pet-location"
                   max-width="sm:max-w-5xl">
                <template #title>
                    <span v-show="lostPet.postType === 'owner'">Ubicación del Extravio</span>
                    <span v-show="lostPet.postType === 'rescuer'">Ubicación del Rescate</span>
                </template>
                <template #content>
                    <form @submit.prevent>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <!--Address-->
                            <div class="w-full md:mx-2">
                                <div class="w-full">
                                    <div class="form-group">
                                        <label for="address">
                                            Dirección
                                            <span class="optional">(opcional)</span>
                                        </label>
                                        <div class="mt-1">
                                            <input type="text"
                                                   v-model="lostPetLocationForm.address"
                                                   class="lp-input"
                                                   id="address">
                                        </div>
                                        <errors :error="errors.address"></errors>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <!--State-->
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="state_id">
                                        <strong class="required">*</strong>
                                        Estado
                                    </label>
                                    <div class="mt-1">
                                        <vue-multiselect v-model="lostPetLocationForm.state"
                                                         :options="states"
                                                         id="state_id"
                                                         label="name"
                                                         track-by="id"
                                                         :show-no-results="true"
                                                         :searchable="true"
                                                         :close-on-select="true"
                                                         :show-labels="true"
                                                         select-label=""
                                                         selected-label=""
                                                         deselect-label=""
                                                         :hide-selected="true"
                                                         placeholder="Selecciona tu Estado..."
                                                         @select="getCities">
                                            <template slot="noResult">
                                                <span class="text-lg text-yellow-600">Lo sentimos, no se encontraron resultados :(</span>
                                            </template>
                                        </vue-multiselect>
                                    </div>
                                </div>
                            </div>
                            <!--City-->
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="city">
                                        <strong class="required">*</strong>
                                        Ciudad
                                    </label>
                                    <div class="mt-1">
                                        <vue-multiselect v-model="lostPetLocationForm.city"
                                                         :options="cities"
                                                         id="city"
                                                         :searchable="true"
                                                         :close-on-select="true"
                                                         :show-labels="true"
                                                         select-label=""
                                                         selected-label=""
                                                         deselect-label=""
                                                         :hide-selected="true"
                                                         placeholder="Selecciona tu Ciudad..."
                                                         @select="getNeighborhoods"
                                        ></vue-multiselect>
                                    </div>
                                </div>
                            </div>
                            <!--Neighborhood-->
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="neighborhood">
                                        <strong class="required">*</strong>
                                        Fraccionamiento/Colonia
                                    </label>
                                    <div class="mt-1">
                                        <vue-multiselect v-model="lostPetLocationForm.neighborhood"
                                                         :options="neighborhoods"
                                                         id="neighborhood"
                                                         :searchable="true"
                                                         :close-on-select="true"
                                                         :show-labels="true"
                                                         select-label=""
                                                         selected-label=""
                                                         deselect-label=""
                                                         :hide-selected="true"
                                                         placeholder="Fraccionamiento/Colonia..."
                                        ></vue-multiselect>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:flex md:-mx-2 mt-4">
                            <!--ZipCode-->
                            <div class="w-full md:w-1/3 md:mx-2 mt-3 md:mt-0">
                                <div class="form-group">
                                    <label for="zip_code">
                                        Código Postal
                                        <span class="optional">(opcional)</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text"
                                               v-model="lostPetLocationForm.zipCode"
                                               class="lp-input"
                                               id="zip_code">
                                    </div>
                                    <errors :error="errors.zip_code"></errors>
                                </div>
                            </div>
                        </div>

                    </form>
                </template>
                <template #footer>
                    <button @click="closeModal"
                            type="button"
                            class="ml-3 lp-link inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-200 border border-gray-200 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:font-semibold focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-primary transition ease-in-out duration-150">
                        Cancelar
                    </button>
                    <button @click="submit"
                            class="ml-3 lp-link inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-200 rounded-md font-semibold text-xs text-cyan-500 uppercase tracking-widest hover:font-semibold hover:shadow-lg hover:bg-cyan-500 hover:text-white focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-primary transition ease-in-out duration-150">
                        Guardar
                    </button>
                </template>
            </modal>
        </div>
    </div>
</template>

<script>
import VueMultiselect from "vue-multiselect";
import SweetAlert from "../../models/SweetAlert";

export default {
    name: 'LostPetLocation',
    inject: ['lostPet'],
    emits: ['lostPets.location'],
    data() {
        return {
            endpoint: `/lost-pets/${this.lostPet.uuid}/location`,
            location: this.lostPet.location,
            states: [],
            cities: [],
            neighborhoods: [],

            lostPetLocationForm: {
                address: '',
                neighborhood: '',
                city: '',
                state: {
                    id: 0,
                    name: '',
                    code: '',
                    country: {
                        id: 0,
                    }
                },
                zipCode: '',
            },

            errors: [],
            actionType: '',
            modal: {
                id: 'lost-pet-location'
            },
        }
    },
    methods: {
        store() {
            axios.post(this.endpoint, {
                'address': this.lostPetLocationForm.address,
                'neighborhood': this.lostPetLocationForm.neighborhood,
                'city': this.lostPetLocationForm.city,
                'state_id': this.lostPetLocationForm.state ? this.lostPetLocationForm.state.id : null,
                'zip_code': this.lostPetLocationForm.zipCode,
            }).then(response => {
                this.closeModal()
                this.location = response.data.data
                window.Event.$emit('lost-pets.location', this.location)
                SweetAlert.success(`La Ubicación ha sido registrada exitosamente!`)
            }).catch(error => {
                this.errors = error.response.status === 422 ?
                    error.response.data.errors :
                    []
            })
        },
        update() {
            axios.put(this.endpoint, {
                'address': this.lostPetLocationForm.address,
                'neighborhood': this.lostPetLocationForm.neighborhood,
                'city': this.lostPetLocationForm.city,
                'state_id': this.lostPetLocationForm.state.id,
                'zip_code': this.lostPetLocationForm.zipCode,
            }).then(response => {
                this.closeModal()
                this.location = response.data.data
                window.Event.$emit('lost-pets.location', this.location)
                SweetAlert.success(`La Ubicación ha sido actualizada exitosamente!`)
            }).catch(error => {
                this.errors = error.response.status === 422 ?
                    error.response.data.errors :
                    []
            })
        },
        getStates() {
            axios.get('/states')
                .then(response => {
                    this.states = response.data.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        getCities(selectedState) {
            let state = this.isObject(selectedState) ? selectedState : this.lostPetLocationForm.state
            axios.get(`/states/${state.name}/cities`)
                .then(response => { this.cities = response.data })
                .catch(error => { console.log(error) })
        },
        getNeighborhoods(selectedCity) {
            let city = selectedCity ? selectedCity : this.lostPetLocationForm.city

            axios.get(`/cities/${city}/neighborhoods`)
                .then(response => { this.neighborhoods = response.data })
                .catch(error => { console.log(error) })
        },
        openModal() {
            this.modal = {}
            this.actionType = this.location ? 'put' : 'post'
            this.errors = []
            this.modal.id = 'lost-pet-location'

            if (this.actionType === 'put') {
                this.lostPetLocationForm.address = this.location.address
                this.lostPetLocationForm.neighborhood = this.location.neighborhood
                this.lostPetLocationForm.city = this.location.city
                this.lostPetLocationForm.state = this.location.state
                this.lostPetLocationForm.zipCode = this.location.zipCode

                this.getCities(this.lostPetLocationForm.state.name)
                this.getNeighborhoods(this.lostPetLocationForm.city)
            }

            window.Event.$emit(`${this.modal.id}:open`)
        },
        closeModal() {
            window.Event.$emit(`${this.modal.id}:close`)
            this.errors = []
            this.actionType = ''
            this.modal = {}
            this.lostPetLocationForm = {}
        },
        submit () {
            if (this.actionType === 'post') {
                this.store()
            }
            if (this.actionType === 'put') {
                this.update()
            }
        },
    },
    created() {
        this.getStates()
    },
    components: {
        VueMultiselect,
        Modal: () => import(/* webpackChunkName: "modal" */ '../../components/Modal'),
        Errors: () => import(/* webpackChunkName: "errors" */ '../../components/Errors'),
        Divider: () => import(/* webpackChunkName: "divider" */ '../../components/Divider'),
    }
}
</script>

<style scoped>

</style>
