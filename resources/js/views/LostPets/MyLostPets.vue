<template>
    <div>
        <div class="items-center flex justify-start">
            <button @click="showForm = ! showForm" class="btn py-4 btn-primary">
                <span v-if="! showForm">Registrar mi mascota perdida</span>
                <span v-if="showForm">Regresar</span>
            </button>
        </div>

        <div v-if="showForm" class="w-2/3 my-6">
            <create-lost-pet></create-lost-pet>
        </div>

        <div v-else>
            <ul role="list"
                class="w-full lg:w-2/3 lg:flex lg:flex-wrap md:-ml-3 my-3">
                <li v-for="lostPet in lostPets"
                    :key="lostPet.id"
                    class="relative py-4 w-full 2xl:w-1/2 px-3">
                    <a :href="lostPet.meta.profile">
                        <pet-card :pet="lostPet"></pet-card>
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
    },
    components: {
        PetCard: () => import(/* webpackChunkName: "pet-card" */ '../../components/PetCard'),
        CreateLostPet: () => import(/* webpackChunkName: "create-lost-pet" */ '../../views/LostPets/CreateLostPet'),
    }
}
</script>
