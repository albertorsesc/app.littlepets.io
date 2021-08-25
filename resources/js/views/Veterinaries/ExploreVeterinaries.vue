<template>
    <div v-cloak>
        <ul v-if="veterinaries.length > 0"
            role="list"
            class="w-full lg:w-2/3 md:flex md:flex-wrap">
            <li v-for="veterinary in veterinaries"
                :key="veterinary.id"
                class="relative py-4 w-full md:w-1/3 lg:px-3">
                <veterinary-card :veterinary="veterinary"
                                 :meta="{ date: veterinary.meta.publishedAt }"
                ></veterinary-card>
            </li>
        </ul>
        <div v-else
             v-cloak
             class="w-2/3 my-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mx-auto flex justify-center">
                    <h2 class="text-gray-700 text-2xl font-medium w-2/3 mb-8 text-center">
                        Registra tu <span class="text-cyan-500">veterinaria</span> en <br>
                        <span class="text-cyan-500">"Mis Veterinarias"</span> y deja que tus pacientes te encuentren en un solo lugar.
                    </h2>
                </div>
                <div class="max-w-3xl mx-auto flex justify-center">
                    <img src="/img/vets.svg" class="h-96 w-auto" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "ExploreVeterinaries",
    data() {
        return {
            veterinaries: [],
        }
    },
    methods: {
        index() {
            axios.get('/veterinaries')
                .then(response => {
                    this.veterinaries = response.data.data
                })
                .catch(error => console.log(error))
        },
    },
    created() {
        this.index()

        window.Event.$on('veterinary-form:store', adoption => {
            this.veterinaries.unshift(adoption)
            this.isFormShown = false
        })
    },
    components: {
        VeterinaryCard: () => import(/* webpackChunkName: "veterinary-card" */ '../../components/Veterinaries/VeterinaryCard'),
    }
}
</script>

<style scoped>

</style>
