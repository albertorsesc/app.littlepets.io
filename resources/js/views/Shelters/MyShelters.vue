<template>
    <div>
        <div class="items-center flex justify-start">
            <button @click="showForm = ! showForm" class="btn py-4 btn-primary">
                <span v-if="! showForm">Registra mi refugio</span>
                <span v-if="showForm">Regresar</span>
            </button>
        </div>

        <div v-show="showForm" class="w-2/3 my-8">
            <create-shelter></create-shelter>
        </div>

        <div class="flex-wrap md:flex sm:justify-center mt-3">



        </div>

    </div>
</template>

<script>
import CreateShelter from '../../views/Shelters/CreateShelter'

export default {
    name: "MyShelters",
    data() {
        return {
            showForm: false
        }
    },
    created() {
        window.Event.$on('shelter-form:store', () => {
            this.showForm = false
        })
    },
    components: {
        CreateShelter,
    }
}
</script>

<style scoped>

</style>
