<template>
    <div>
        <div class="items-center flex justify-start" v-cloak>
            <button @click="showForm = ! showForm" class="btn py-4 btn-primary">
                <span v-if="! showForm">Registra una nueva adopcion</span>
                <span v-if="showForm">Regresar</span>
            </button>
        </div>

        <div v-show="showForm" class="w-full lg:w-2/3 my-8">
            <create-adoption></create-adoption>
        </div>

        <div v-show="! showForm" class="-ml-2 mt-6 w-full md:w-1/2">
            <ul role="list"
                class="w-full lg:w-2/3 lg:flex lg:flex-wrap" v-cloak>
                <li v-for="adoption in adoptions"
                    :key="adoption.id"
                    class="cursor-pointer relative py-4 w-full px-3">
                    <a :href="`/adopciones/${adoption.id}`">
                        <pet-card :data="adoption"
                                  :meta="{ date: adoption.meta.publishedAt }"
                        ></pet-card>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</template>

<script>

export default {
    name: "MyAdoptions",
    data() {
        return {
            adoptions: [],
            showForm: false
        }
    },
    methods: {
        index() {
            axios.get('/my-adoptions')
                .then(response => {
                    this.adoptions = response.data.data
                })
                .catch(error => console.log(error))
        },
    },
    created() {
        this.index()

        window.Event.$on('adoption-form:store', newAdoption => {
            this.adoptions.unshift(newAdoption)
            this.showForm = false
        })
    },
    components: {
        PetCard: () => import(/* webpackChunkName: "pet-card" */ '../../components/PetCard'),
        CreateAdoption: () => import(/* webpackChunkName: "create-adoption" */ '../../views/Adoptions/CreateAdoption'),
    }
}
</script>
