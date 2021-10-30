<template>
    <div>
        <div class="items-center flex justify-start" v-cloak>
            <button @click="showForm = ! showForm" class="lp-btn">
                <span v-if="! showForm">Registra una nueva adopción</span>
                <span v-if="showForm">Regresar</span>
            </button>
        </div>

        <div v-show="showForm" class="w-full lg:w-2/3 my-8">
            <create-adoption></create-adoption>
        </div>

        <div v-show="! showForm" class="-ml-2 mt-2 w-full md:w-1/2">
            <pet-list :data="adoptions"></pet-list>
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
    },
    components: {
        PetList: () => import(/* webpackChunkName: "pet-list" */ '../../components/Pets/PetList'),
        CreateAdoption: () => import(/* webpackChunkName: "create-adoption" */ './CreateAdoption'),
    }
}
</script>
