<template>
    <div>
        <ul role="list"
            class="w-full lg:w-2/3 lg:flex lg:flex-wrap">
            <li v-for="lostPet in lostPets"
                :key="lostPet.id"
                class="relative py-4 w-full 2xl:w-1/2 px-3">
                <a :href="lostPet.meta.profile">
                    <pet-card :pet="lostPet"></pet-card>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "ExploreLostPets",
    data() {
        return {
            lostPets: [],
        }
    },
    methods: {
        index() {
            axios.get('/lost-pets')
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
    }
}
</script>

<style scoped>

</style>
