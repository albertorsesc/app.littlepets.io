<template>
    <div>
        <div class="items-center flex justify-start w-1/6" v-cloak>
            <button @click="showForm = ! showForm" class="btn py-4 btn-primary">
                <span v-if="! showForm">Registra una nueva veterinaria</span>
                <span v-if="showForm">Regresar</span>
            </button>
        </div>

        <div v-show="showForm" class="w-full lg:w-2/3 my-8">
            <create-veterinary></create-veterinary>
        </div>

        <div v-show="! showForm" class="-ml-2 mt-6 w-full">
            <ul role="list" class="w-full lg:w-2/3 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3" v-cloak>
                <li v-for="veterinary in veterinaries"
                    :key="veterinary.id">
                    <veterinary-card :veterinary="veterinary"></veterinary-card>
                </li>
            </ul>
        </div>

    </div>
</template>

<script>

export default {
    name: "MyVeterinaries",
    data() {
        return {
            veterinaries: [],
            veterinaryServices: [],
            showForm: false
        }
    },
    methods: {
        index() {
            axios.get('/my-veterinaries')
                .then(response => {
                    this.veterinaries = response.data.data
                })
                .catch(error => console.log(error))
        },
    },
    created() {
        this.index()

        window.Event.$on('veterinary-form:store', newAdoption => {
            this.veterinaries.unshift(newAdoption)
            this.showForm = false
        })
    },
    components: {
        VeterinaryCard: () => import(/* webpackChunkName: "veterinary-card" */ '../../components/Veterinaries/VeterinaryCard'),
        CreateVeterinary: () => import(/* webpackChunkName: "create-veterinary" */ '../../views/Veterinaries/CreateVeterinary'),
    }
}
</script>
