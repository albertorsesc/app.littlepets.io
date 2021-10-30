<template>
    <div>
        <ul role="list"
            class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-6" v-cloak>
            <li v-for="item in data"
                :key="item.id"
                class="cursor-pointer relative py-4 w-full px-3 col-span-3"
                @click="openAdoptionSlider(item)">
                <pet-card :data="item"
                          :meta="{ date: item.meta.publishedAt }"
                ></pet-card>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "PetList",
    emits: ['slider:open'],
    props: {
        data: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            localData: this.data,
        }
    },
    methods: {
        openAdoptionSlider(data) {
            window.Event.$emit('slider:open', data)
        },
    },
    created() {
        window.Event.$on('adoption-form:store', data => {
            this.localData.unshift(data)
            this.showForm = false
        })
    },
    components: {
        PetCard: () => import(/* webpackChunkName: "pet-card" */ './PetCard'),
    }
}
</script>

<style scoped>

</style>
