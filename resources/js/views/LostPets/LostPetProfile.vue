<script>
import {DateTime} from "luxon";
import { Datetime } from 'vue-datetime'
import SweetAlert from "../../models/SweetAlert";

export default {
    name: "LostPetProfile",
    props: {
        lostPet: {
            required: true,
            type: Object
        }
    },
    provide() {
        return {
            lostPet: this.localLostPet,
            pet: this.localLostPet.pet,
        }
    },
    data() {
        return {
            localLostPet: this.lostPet,

            species: [],

            lostPetForm: {pet: {}},
            selectedSpecie: {},
            selectedBreed: {},
            formattedLostAt: '',
            formattedRescuedAt: '',

            commentForm: {},
            selectedComment: {},
            updatingComment: false,

            modal: {},
            errors: [],
            actionType: '',
            isLoading: false,
            status: {
                btnTitle: this.lostPet.publishedAt ? 'ocultar' : 'publicar',
                alertClass: this.lostPet.publishedAt ? 'bg-green-200' : 'bg-gray-200',
                icon: this.lostPet.publishedAt ? 'fas fa-eye-slash' : 'far fa-eye'
            },
        }
    },
    methods: {
        update() {
            this.isLoading = true
            axios.put(`/lost-pets/${this.lostPet.uuid}`, {
                specie_id: this.lostPetForm.pet.specie.id,
                name: this.lostPetForm.pet.name,
                gender: this.lostPetForm.pet.gender,
                size: this.lostPetForm.pet.size,
                age: this.lostPetForm.pet.age,
                age_range: this.lostPetForm.pet.ageRange,
                post_type: this.lostPetForm.postType,
                phone: this.lostPetForm.phone,
                description: this.lostPetForm.description,
                lost_at: this.lostPetForm.lostAt,
                found_at: this.lostPetForm.foundAt,
                rescued_at: this.lostPetForm.rescuedAt,
            })
            .then(response => {
                this.localLostPet = response.data.data
                this.closeModal()
                this.isLoading = false
                SweetAlert.success('La Publicación ha sido actualizada exitosamente!')
            })
            .catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors
                } else {
                    this.errors = []
                }
                console.log(error)
                this.isLoading = false
            })
        },
        destroy() {
            axios.delete(`/lost-pets/${this.lostPet.uuid}`)
            .then(() => {
                setTimeout( () => {
                        window.location.href = `/perdidos-y-encontrados`
                    }, 1500)
            })
            .catch(error => console.log(error))
        },
        onDelete() {
            SweetAlert.danger(
                `Eliminar la Publicación`,
                'La Publicación ha sido eliminada exitosamente!',
            )
        },
        comment() {
            axios.post(`/lost-pets/${this.lostPet.uuid}/comments`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localLostPet.comments.unshift(response.data.data)
                this.selectedComment = {}
                SweetAlert.toast('Gracias por tu comentario.')
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors
                } else {
                    this.errors = []
                }
            })
        },
        updateComment() {
            axios.put(`/lost-pets/${this.lostPet.uuid}/comments/${this.selectedComment.id}`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localLostPet.comments = response.data.data
                this.selectedComment = {}
                this.updatingComment = false
                SweetAlert.toast('Comentario actualizado.')
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors
                } else {
                    this.errors = []
                }
                console.log(error)
                this.updatingComment = false
            })
        },
        onUpdateComment(comment) {
            this.updatingComment = true
            this.commentForm = this.selectedComment = comment
        },
        destroyComment(comment) {
            axios.delete(`/lost-pets/${this.lostPet.uuid}/comments/${comment.id}`)
            .then(() => {
                this.localLostPet.comments = this.localLostPet.comments.filter(item => item.id !== comment.id)
                SweetAlert.toast('Comentario eliminado.')
            }).catch(error => console.log(error))
        },
        onDeleteComment(comment) {
            if (confirm('Deseas eliminar este comentario?')) {
                this.destroyComment(comment)
            }
        },
        getSpecies() {
            axios.get('/species')
                .then(response => {
                    this.species = response.data.data
                })
                .catch(error => console.log(error))
        },
        toggle() {
            this.isLoading = true
            axios
                .put(`/lost-pets/${this.localLostPet.uuid}/toggle`)
                .then(response => {
                    this.localLostPet.meta.publishedAt = response.data
                    let isPublished = this.localLostPet.meta.publishedAt ? 'Publicada' : 'Ocultada'
                    SweetAlert.success(`Tu Publicación ha sido ${isPublished} existosamente!`)
                    this.isLoading = false
                })
                .catch(error => {
                    this.errors = error.response.status === 422 ?
                        error.response.data.errors :
                        []
                    this.isLoading = false
                })
        },
        togglePetFound() {
            this.isLoading = true
            axios
                .put(`/lost-pets/${this.localLostPet.uuid}/found`)
                .then(response => {
                    this.localLostPet.meta.foundAt = response.data
                    let adopted = this.localLostPet.meta.foundAt ? 'Encontrad@' : 'Sin Encontrar'
                    SweetAlert.success(`Marcado como: ${adopted}`)
                    this.isLoading = false
                })
                .catch(error => {
                    this.errors = error.response.status === 422 ?
                        error.response.data.errors :
                        []
                    this.isLoading = false
                })
        },
        togglePetRescued() {
            this.isLoading = true
            axios
                .put(`/lost-pets/${this.localLostPet.uuid}/rescued`)
                .then(response => {
                    this.localLostPet.meta.rescuedAt = response.data
                    let adopted = this.localLostPet.meta.rescuedAt ? 'Rescatado@' : 'Sin Rescatar'
                    SweetAlert.success(`Marcado como: ${adopted}`)
                    this.isLoading = false
                })
                .catch(error => {
                    this.errors = error.response.status === 422 ?
                        error.response.data.errors :
                        []
                    this.isLoading = false
                })
        },
        openModal(action) {
            this.modal = {}
            this.actionType = action
            this.errors = []

            if (action === 'report') {
                this.modal = {
                    id: 'reports',
                }
            }

            if (action === 'put') {
                this.lostPetForm.pet.specie = this.localLostPet.pet.specie
                this.lostPetForm.pet.name = this.localLostPet.pet.name
                this.lostPetForm.pet.gender = this.localLostPet.pet.gender
                this.lostPetForm.pet.size = this.localLostPet.pet.size
                this.lostPetForm.pet.ageRange = this.localLostPet.pet.ageRange
                this.lostPetForm.pet.age = this.localLostPet.pet.age
                this.lostPetForm.postType = this.localLostPet.postType
                this.lostPetForm.phone = this.localLostPet.phone
                this.lostPetForm.description = this.localLostPet.description
                this.lostPetForm.lostAt = this.localLostPet.meta.lostAt
                this.lostPetForm.rescuedAt = this.localLostPet.rescuedAt

                this.modal.id = 'update-lost-pet'
            }

            window.Event.$emit(`${this.modal.id}:open`)
        },
        closeModal() {
            window.Event.$emit(`${this.modal.id}:close`)
            this.errors = []
            this.actionType = ''
            this.modal = {}
            this.lostPetForm = {pet: {}}
            this.selectedSpecie = {}
            this.selectedBreed = {}
        },
    },
    created() {
        this.getSpecies()

        window.Event.$on('SweetAlert:destroy', () => { this.destroy() })

        this.formattedLostAt = DateTime.fromISO(this.localLostPet.meta.lostAt).setLocale('es').toFormat('MMM d y, hh:mm')
        this.formattedRescuedAt = DateTime.fromISO(this.localLostPet.meta.rescuedAt).setLocale('es').toFormat('MMM d y, hh:mm')
    },
    components: {
        Datetime,
        Modal: () => import(/* webpackChunkName: "modal" */ '../../components/Modal'),
        Report: () => import(/* webpackChunkName: "report" */ '../../components/Report'),
        Divider: () => import(/* webpackChunkName: "divider" */ '../../components/Divider'),
        PetImages: () => import(/* webpackChunkName: "pet-images" */ '../../components/Pets/PetImages'),
        LostPetLocation: () => import(/* webpackChunkName: "lost-pet-location" */ './LostPetLocation'),
        CustomCarousel: () => import(/* webpackChunkName: "custom-carousel" */ '../../components/CustomCarousel'),
    }
}
</script>

<style scoped>

</style>
