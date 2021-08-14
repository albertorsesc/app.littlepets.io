<script>
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
            axios.put(`/lost-pets/${this.lostPet.id}`, {
                breed_id: this.selectedBreed.id,
                name: this.lostPetForm.pet.name,
                gender: this.lostPetForm.pet.gender,
                size: this.lostPetForm.pet.size,
                age: this.lostPetForm.pet.age,
                age_range: this.lostPetForm.pet.ageRange,
                phone: this.lostPetForm.phone,
                description: this.lostPetForm.description,
                lost_at: this.lostPetForm.lostAt,
                rescued_at: this.lostPetForm.rescuedAt,
            })
            .then(response => {
                this.localLostPet = response.data.data
                this.closeModal()
                this.isLoading = false
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
            axios.delete(`/lost-pets/${this.lostPet.id}`)
            .then(() => {
                setTimeout( () => {
                        window.location.href = `/perdidos-y-encontrados`
                    }, 1500)
            })
            .catch(error => console.log(error))
        },
        onDelete() {
            if (confirm('Seguro que desea eliminar las mascota extraviada?')) {
                this.destroy()
            }
        },
        comment() {
            axios.post(`/lost-pets/${this.lostPet.id}/comments`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localLostPet.comments.unshift(response.data.data)
                this.selectedComment = {}
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors
                } else {
                    this.errors = []
                }
            })
        },
        updateComment() {
            axios.put(`/lost-pets/${this.lostPet.id}/comments/${this.selectedComment.id}`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localLostPet.comments = response.data.data
                this.selectedComment = {}
                this.updatingComment = false
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
            axios.delete(`/lost-pets/${this.lostPet.id}/comments/${comment.id}`)
            .then(() => {
                this.localLostPet.comments = this.localLostPet.comments.filter(item => item.id !== comment.id)
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
                .put(`/lost-pets/${this.localLostPet.id}/toggle`)
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
                .put(`/lost-pets/${this.localLostPet.id}/found`)
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
                .put(`/lost-pets/${this.localLostPet.id}/rescued`)
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
                this.lostPetForm.pet.age = this.localLostPet.pet.age
                this.lostPetForm.phone = this.localLostPet.phone
                this.lostPetForm.description = this.localLostPet.description
                this.lostPetForm.lostAt = this.localLostPet.lostAt
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
    },
    components: {
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
