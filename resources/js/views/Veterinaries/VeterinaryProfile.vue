<script>
import VueMultiselect from 'vue-multiselect'
import SweetAlert from "../../models/SweetAlert";

export default {
    name: "VeterinaryProfile",
    props: {
        veterinary: {
            required: true,
            type: Object
        }
    },
    provide() {
        return {
            veterinary: this.localVeterinary,
        }
    },
    data() {
        return {
            localVeterinary: this.veterinary,

            veterinaryServices: [],

            veterinaryForm: { services: [] },

            commentForm: {},
            selectedComment: {},
            updatingComment: false,

            modal: {},
            errors: [],
            actionType: '',
            isLoading: false,
            status: {
                btnTitle: this.veterinary.meta.publishedAt ? 'ocultar' : 'publicar',
                alertClass: this.veterinary.meta.publishedAt ? 'bg-green-200' : 'bg-gray-200',
                icon: this.veterinary.meta.publishedAt ? 'fas fa-eye-slash' : 'far fa-eye'
            },
        }
    },
    methods: {
        update() {
            this.isLoading = true
            axios.put(`/veterinaries/${this.veterinary.slug}`, {
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
                this.localVeterinary = response.data.data
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
            axios.delete(`/veterinaries/${this.veterinary.slug}`)
            .then(() => {
                setTimeout( () => {
                        window.location.href = `/veterinarias`
                    }, 1500)
            })
            .catch(error => console.log(error))
        },
        onDelete() {
            SweetAlert.danger(
                `Eliminar la Veterinaria: ${this.localVeterinary.name}`,
                'La Veterinaria ha sido eliminada exitosamente!',
            )
        },
        comment() {
            axios.post(`/veterinaries/${this.veterinary.slug}/comments`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localVeterinary.comments.unshift(response.data.data)
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
            axios.put(`/veterinaries/${this.veterinary.slug}/comments/${this.selectedComment.id}`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localVeterinary.comments = response.data.data
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
            axios.delete(`/veterinaries/${this.veterinary.slug}/comments/${comment.id}`)
            .then(() => {
                this.localVeterinary.comments = this.localVeterinary.comments.filter(item => item.id !== comment.id)
                SweetAlert.toast('Comentario eliminado.')
            }).catch(error => console.log(error))
        },
        onDeleteComment(comment) {
            if (confirm('Deseas eliminar este comentario?')) {
                this.destroyComment(comment)
            }
        },
        toggle() {
            this.isLoading = true
            axios
                .put(`/veterinaries/${this.localVeterinary.slug}/toggle`)
                .then(response => {
                    this.localVeterinary.meta.publishedAt = response.data
                    let isPublished = this.localVeterinary.meta.publishedAt ? 'Publicada' : 'Ocultada'
                    SweetAlert.success(`Tu Veterinaria ha sido ${isPublished} exitosamente!`)
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
                this.veterinaryForm.name = this.localVeterinary.name
                this.veterinaryForm.services = this.localVeterinary.services
                this.veterinaryForm.specialty = this.localVeterinary.specialty
                this.veterinaryForm.phone = this.localVeterinary.phone
                this.veterinaryForm.email = this.localVeterinary.email
                this.veterinaryForm.isOpenAtNight = this.localVeterinary.isOpenAtNight
                this.veterinaryForm.facebookProfile = this.localVeterinary.facebookProfile
                this.veterinaryForm.site = this.localVeterinary.site
                this.veterinaryForm.about = this.localVeterinary.about

                this.modal.id = 'update-veterinary'
            }

            window.Event.$emit(`${this.modal.id}:open`)
        },
        closeModal() {
            window.Event.$emit(`${this.modal.id}:close`)
            this.errors = []
            this.actionType = ''
            this.modal = {}
            this.veterinaryForm = {services: []}
            this.selectedSpecie = {}
            this.selectedBreed = {}
        },
        getVeterinaryServices() {
            axios.get('/veterinary-services')
                .then(response => {
                    this.veterinaryServices = response.data.data
                })
                .catch(error => console.log(error))
        },
    },
    created() {
        this.getVeterinaryServices()
        window.Event.$on('SweetAlert:destroy', () => { this.destroy() })

        window.Event.$on('veterinaries.location', location => {
            this.localVeterinary.location = location
        })
    },
    components: {
        VueMultiselect,
        Alert: () => import(/* webpackChunkName: "alert" */ '../../components/Alert'),
        Modal: () => import(/* webpackChunkName: "modal" */ '../../components/Modal'),
        Report: () => import(/* webpackChunkName: "report" */ '../../components/Report'),
        Divider: () => import(/* webpackChunkName: "divider" */ '../../components/Divider'),
        VeterinaryLocation: () => import(/* webpackChunkName: "veterinary-location" */ './VeterinaryLocation'),
        CustomCarousel: () => import(/* webpackChunkName: "custom-carousel" */ '../../components/CustomCarousel'),
        Likes: () => import(/* webpackChunkName: "likes" */ '../../components/Likes'),
    }
}
</script>

<style scoped>

</style>
