<template>
    <div v-if="isOwner">
        <divider title="Imágenes"></divider>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="flex justify-between px-4 py-5 sm:px-6 items-center">
                <h3 class="flex text-lg leading-6 font-medium text-gray-500 items-center">
                    <svg class="mr-2 h-5 w-5 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Imágenes
                </h3>
                <div v-if="images.length > 0">
                    <button @click="openModal"
                            class="lp-link bg-white border-cyan-900 -mt-1 shadow rounded-md py-2 px-2 float-left hover:text-cyan-500 focus:outline-none focus:shadow-outline-blue active:text-cyan-800"
                            title="Administrar Imágenes...">
                        <svg class="h-6 w-6 text-cyan-400 hover:text-cyan-600 appearance-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                    <modal modal-id="manage-pet-images" max-width="sm:max-w-5xl">
                        <template #title>Administrar Imágenes</template>
                        <template #content>
                            <div class="md:flex md:flex-wrap">
                                <div class="w-full items-center md:w-32 p-2" v-for="image in images" :key="image.id">
                                    <!--baseUrl + `/img/small/${image.file_name.split('public/').pop()}`-->
                                    <img :src="isProduction ? image.file_name : baseUrl + `/img/small/${image.file_name.split('public/').pop()}`"
                                         class="h-32 w-32 z-0"
                                         title="Eliminar imágen"
                                         alt="Property image">
                                    <svg @click="deleteMedia(image.id)"
                                         class="text-red-500 bg-white h-8 w-8 -mt-4 ml-24 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </template>
                    </modal>
                </div>
            </div>
            <div v-if="pet.user.id === auth"
                 class="border-t border-gray-200 mx-4 py-5 sm:px-6">
                <div class="w-full mt-4">
                    <dropzone :endpoint="endpoint"></dropzone>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import SweetAlert from "../../models/SweetAlert";

export default {
    name: "PetImages",
    inject: ['pet'],
    emits: ['pets-images-destroy'],
    data () {
        return {
            endpoint: `/api/pets/${this.pet.id}/images`,
            images: this.pet.images,
            modal: {},
            errors: [],
        }
    },
    methods: {
        openModal(action) {
            this.modal = {}
            this.actionType = action
            this.errors = []
            this.modal.id = 'manage-pet-images'

            window.Event.$emit(`${this.modal.id}:open`)
        },
        closeModal() {
            window.Event.$emit(`${this.modal.id}:close`)
            this.modal = {}
        },
        deleteMedia(imageId) {
            axios.delete(`/pets/${this.pet.id}/images/${imageId}`)
            .then(() => {
                this.images = this.images.filter(image => image.id !== imageId)
                SweetAlert.toast('La Imagen ha sido eliminada exitosamente!')
                window.Event.$emit('pets-images-destroy', this.images)

                if (this.images.length === 0) {
                    this.reload(500)
                }
            })
            .catch(error => console.log(error))
        },
    },
    computed: {
        isOwner() {
            return this.pet.user.id === this.auth
        }
    },
    mounted() {
        window.Event.$on('dropzone.success', response => {
            SweetAlert.success('Las imágenes han sido guardadas exitosamente!')
            setTimeout(() => {
                window.location.reload()
            }, 1500)
        })
    },
    components: {
        Modal: () => import(/* webpackChunkName: "modal" */ '../Modal'),
        Divider: () => import(/* webpackChunkName: "divider" */ '../Divider'),
        Dropzone: () => import(/* webpackChunkName: "dropzone" */ '../Dropzone'),
    }

}
</script>

<style scoped>

</style>
