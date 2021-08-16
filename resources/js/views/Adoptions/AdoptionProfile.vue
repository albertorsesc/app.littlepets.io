<script>
import SweetAlert from "../../models/SweetAlert";

export default {
    name: "AdoptionProfile",
    props: {
        adoption: {
            required: true,
            type: Object
        }
    },
    provide() {
        return {
            adoption: this.localAdoption,
            pet: this.localAdoption.pet,
        }
    },
    data() {
        return {
            localAdoption: this.adoption,

            species: [],

            adoptionForm: { pet: {} },
            selectedSpecie: {},

            commentForm: {},
            selectedComment: {},
            updatingComment: false,

            modal: {},
            errors: [],
            actionType: '',
            isLoading: false,
            status: {
                btnTitle: this.adoption.publishedAt ? 'ocultar' : 'publicar',
                alertClass: this.adoption.publishedAt ? 'bg-green-200' : 'bg-gray-200',
                icon: this.adoption.publishedAt ? 'fas fa-eye-slash' : 'far fa-eye'
            },
        }
    },
    methods: {
        update() {
            this.isLoading = true
            axios.put(`/adoptions/${this.adoption.uuid}`, {
                specie_id: this.adoptionForm.pet.specie.id,
                title: this.adoptionForm.title,
                name: this.adoptionForm.pet.name,
                gender: this.adoptionForm.pet.gender,
                size: this.adoptionForm.pet.size,
                age: this.adoptionForm.pet.age,
                age_range: this.adoptionForm.pet.ageRange,
                bio: this.adoptionForm.bio,
                story: this.adoptionForm.story,
            })
            .then(response => {
                this.localAdoption = response.data.data
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
            axios.delete(`/api/adoptions/${this.adoption.uuid}`)
            .then(() => {
                setTimeout( () => {
                        window.location.href = `/adopciones`
                    }, 1500)
            })
            .catch(error => console.log(error))
        },
        onDelete() {
            SweetAlert.danger(
                `Eliminar la Adopción: ${this.localAdoption.title}`,
                'La Adopción ha sido eliminada exitosamente!',
            )
        },
        comment() {
            axios.post(`/adoptions/${this.adoption.uuid}/comments`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localAdoption.comments.unshift(response.data.data)
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
            axios.put(`/adoptions/${this.adoption.uuid}/comments/${this.selectedComment.id}`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localAdoption.comments = response.data.data
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
            axios.delete(`/adoptions/${this.adoption.uuid}/comments/${comment.id}`)
            .then(() => {
                this.localAdoption.comments = this.localAdoption.comments.filter(item => item.id !== comment.id)
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
                .put(`/adoptions/${this.localAdoption.uuid}/toggle`)
                .then(response => {
                    this.localAdoption.meta.publishedAt = response.data
                    let isPublished = this.localAdoption.meta.publishedAt ? 'Publicada' : 'Ocultada'
                    SweetAlert.success(`Tu Adopción ha sido ${isPublished} existosamente!`)
                    this.isLoading = false
                })
                .catch(error => {
                    this.errors = error.response.status === 422 ?
                        error.response.data.errors :
                        []
                    this.isLoading = false
                })
        },
        toggleAdoption() {
            this.isLoading = true
            axios
                .put(`/adoptions/${this.localAdoption.uuid}/adopted`)
                .then(response => {
                    this.localAdoption.meta.adoptedAt = response.data
                    let adopted = this.localAdoption.meta.adoptedAt ? 'Adoptad@' : 'Sin Adoptar'
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
                this.adoptionForm.pet.specie = this.localAdoption.pet.specie
                this.adoptionForm.title = this.localAdoption.title
                this.adoptionForm.pet.name = this.localAdoption.pet.name
                this.adoptionForm.pet.gender = this.localAdoption.pet.gender
                this.adoptionForm.pet.size = this.localAdoption.pet.size
                this.adoptionForm.pet.age = this.localAdoption.pet.age
                this.adoptionForm.pet.ageRange = this.localAdoption.pet.ageRange
                this.adoptionForm.bio = this.localAdoption.bio
                this.adoptionForm.story = this.localAdoption.story

                this.modal.id = 'update-adoption'
            }

            window.Event.$emit(`${this.modal.id}:open`)
        },
        closeModal() {
            window.Event.$emit(`${this.modal.id}:close`)
            this.errors = []
            this.actionType = ''
            this.modal = {}
            this.adoptionForm = {pet: {}}
            this.selectedSpecie = {}
            this.selectedBreed = {}
        },
    },
    created() {
        this.getSpecies()

        window.Event.$on('SweetAlert:destroy', () => { this.destroy() })
    },
    components: {
        Alert: () => import(/* webpackChunkName: "alert" */ '../../components/Alert'),
        Modal: () => import(/* webpackChunkName: "modal" */ '../../components/Modal'),
        Report: () => import(/* webpackChunkName: "report" */ '../../components/Report'),
        Divider: () => import(/* webpackChunkName: "divider" */ '../../components/Divider'),
        AdoptionLocation: () => import(/* webpackChunkName: "adoption-location" */ './AdoptionLocation'),
        CustomCarousel: () => import(/* webpackChunkName: "custom-carousel" */ '../../components/CustomCarousel'),
        PetImages: () => import(/* webpackChunkName: "pet-images" */ '../../components/Pets/PetImages'),
    }
}
</script>

<style scoped>

</style>
