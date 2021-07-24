<script>
export default {
    name: "LostPetProfile",
    props: {
        lostPet: {
            required: true,
            type: Object
        }
    },
    data() {
        return {
            localLostPet: this.lostPet,

            species: [],
            breeds: [],

            lostPetForm: {},
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
            axios.put(`/api/lost-pets/${this.lostPet.id}`, {
                breed_id: this.selectedBreed.id,
                name: this.lostPetForm.name,
                gender: this.lostPetForm.gender,
                size: this.lostPetForm.size,
                age: this.lostPetForm.age,
                phone: this.lostPetForm.phone,
                description: this.lostPetForm.description,
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
            axios.delete(`/api/lost-pets/${this.lostPet.id}`)
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
        getBreedsBySpecie(specie) {
            let selectedSpecie = specie ? specie : this.selectedSpecie
            this.selectedBreed = {}

            axios.get(`/species/${selectedSpecie.id}/breeds`)
                .then(response => {
                    this.breeds = response.data.data
                })
                .catch(error => console.log(error))
        },
        toggle() {
            this.isLoading = true
            axios
                .put(`/lost-pets/${this.localLostPet.id}/toggle`)
                .then(response => {
                    this.localLostPet.meta.publishedAt = response.data
                    let publishedAt = this.localLostPet.meta.publishedAt ? 'Publicada' : 'Ocultada'
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

            if (action === 'put') {
                this.selectedSpecie = this.localLostPet.breed.specie
                this.getBreedsBySpecie(this.selectedSpecie)
                this.lostPetForm.breed = this.selectedBreed = this.localLostPet.breed
                this.lostPetForm.name = this.localLostPet.name
                this.lostPetForm.gender = this.localLostPet.gender
                this.lostPetForm.size = this.localLostPet.size
                this.lostPetForm.age = this.localLostPet.age
                this.lostPetForm.phone = this.localLostPet.phone
                this.lostPetForm.description = this.localLostPet.description

                this.modal.id = 'update-lost-pet'
            }

            window.Event.$emit(`${this.modal.id}:open`)
        },
        closeModal() {
            window.Event.$emit(`${this.modal.id}:close`)
            this.errors = []
            this.actionType = ''
            this.modal = {}
            this.lostPetForm = {}
            this.selectedSpecie = {}
            this.selectedBreed = {}
        },
    },
    created() {
        this.getSpecies()
    },
    components: {
        Modal: () => import(/* webpackChunkName: "modal" */ '../../components/Modal'),
    }
}
</script>

<style scoped>

</style>
