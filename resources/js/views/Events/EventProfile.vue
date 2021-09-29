<script>
import {DateTime} from "luxon";
import VueMultiselect from 'vue-multiselect'
import SweetAlert from "../../models/SweetAlert";

export default {
    name: "EventProfile",
    props: {
        event: {
            required: true,
            type: Object
        }
    },
    provide() {
        return {
            event: this.localEvent,
        }
    },
    data() {
        return {
            localEvent: this.event,

            eventServices: [],

            eventForm: {},
            formattedStartsAt: '',
            formattedEndsAt: '',

            commentForm: {},
            selectedComment: {},
            updatingComment: false,

            modal: {},
            errors: [],
            actionType: '',
            isLoading: false,
            status: {
                btnTitle: this.event.meta.publishedAt ? 'ocultar' : 'publicar',
                alertClass: this.event.meta.publishedAt ? 'bg-green-200' : 'bg-gray-200',
                icon: this.event.meta.publishedAt ? 'fas fa-eye-slash' : 'far fa-eye'
            },
        }
    },
    methods: {
        update() {
            this.isLoading = true
            axios.put(`/events/${this.event.id}`, {
                title: this.eventForm.title,
                excerpt: this.eventForm.excerpt,
                starts_at: this.eventForm.startsAt,
                ends_at: this.eventForm.endsAt,
                description: this.eventForm.description,
            })
            .then(response => {
                this.localEvent = response.data.data
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
            axios.delete(`/events/${this.event.uuid}`)
            .then(() => {
                setTimeout( () => {
                        window.location.href = `/eventos`
                    }, 1500)
            })
            .catch(error => console.log(error))
        },
        onDelete() {
            SweetAlert.danger(
                `Eliminar el Evento: ${this.localEvent.name}`,
                'El Evento ha sido eliminado exitosamente!',
            )
        },
        comment() {
            axios.post(`/events/${this.event.uuid}/comments`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localEvent.comments.unshift(response.data.data)
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
            axios.put(`/events/${this.event.uuid}/comments/${this.selectedComment.id}`, {
                body: this.selectedComment.body
            }).then(response => {
                this.localEvent.comments = response.data.data
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
            axios.delete(`/events/${this.event.uuid}/comments/${comment.id}`)
            .then(() => {
                this.localEvent.comments = this.localEvent.comments.filter(item => item.id !== comment.id)
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
                .put(`/events/${this.localEvent.uuid}/toggle`)
                .then(response => {
                    this.localEvent.meta.publishedAt = response.data
                    let isPublished = this.localEvent.meta.publishedAt ? 'Publicado' : 'Ocultado'
                    SweetAlert.success(`Tu Evento ha sido ${isPublished} exitosamente!`)
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
                this.eventForm.title = this.localEvent.title
                this.eventForm.excerpt = this.localEvent.excerpt
                this.eventForm.description = this.localEvent.description
                this.eventForm.startsAt = this.localEvent.startsAt
                this.eventForm.endsAt = this.localEvent.endsAt

                this.modal.id = 'update-event'
            }

            window.Event.$emit(`${this.modal.id}:open`)
        },
        closeModal() {
            window.Event.$emit(`${this.modal.id}:close`)
            this.errors = []
            this.actionType = ''
            this.modal = {}
            this.eventForm = {services: []}
            this.selectedSpecie = {}
            this.selectedBreed = {}
        },
    },
    created() {
        window.Event.$on('SweetAlert:destroy', () => { this.destroy() })

        window.Event.$on('event.location', location => {
            this.localEvent.location = location
        })
    },
    components: {
        VueMultiselect,
        Likes: () => import(/* webpackChunkName: "likes" */ '../../components/Likes'),
        Alert: () => import(/* webpackChunkName: "alert" */ '../../components/Alert'),
        Modal: () => import(/* webpackChunkName: "modal" */ '../../components/Modal'),
        Report: () => import(/* webpackChunkName: "report" */ '../../components/Report'),
        Divider: () => import(/* webpackChunkName: "divider" */ '../../components/Divider'),
        // EventLocation: () => import(/* webpackChunkName: "event-location" */ './EventLocation'),
        DateTime: () => import(/* webpackChunkName: "date-time" */ '../../components/DateTime'),
        CustomCarousel: () => import(/* webpackChunkName: "custom-carousel" */ '../../components/CustomCarousel'),
    }
}
</script>
