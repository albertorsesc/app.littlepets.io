<template>
    <div>
        <div class="items-center flex justify-start">
            <button @click="showForm = ! showForm" class="lp-btn">
                <span v-if="! showForm">Registrar mi mascota perdida</span>
                <span v-if="showForm">Regresar</span>
            </button>
        </div>

        <div v-if="showForm" class="my-8">
            <create-lost-pet />
        </div>

        <div v-else>
            <ul role="list"
                class="w-full md:w-2/3 md:flex md:flex-wrap md:-ml-3 my-3">
                <li v-for="lostPet in lostPets"
                    :key="lostPet.id"
                    class="relative py-4 w-full 2xl:w-1/2 md:px-3">
                    <a :href="lostPet.meta.profile">
                        <pet-card :data="lostPet" :meta="{ date: lostPet.publishedAt }"></pet-card>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</template>

<script>
export default {
    name: "MyLostPets",
    data() {
        return {
            lostPets: [],

            showForm: false,
        }
    },
    methods: {
        index() {
            axios.get(`/my-lost-pets`)
            .then(response => {
                this.lostPets = response.data.data
            }).catch(error => console.log(error))
        }
    },
    created() {
        this.index()

        window.Event.$on('lost-pet-form:store', newLostPet => {
            this.lostPets.unshift(newLostPet)
            this.showForm = false
        })
    },
    components: {
        PetCard: () => import(/* webpackChunkName: "pet-card" */ '../../components/PetCard'),
        CreateLostPet: () => import(/* webpackChunkName: "create-lost-pet" */ '../../views/LostPets/CreateLostPet'),
    }
}
</script>
