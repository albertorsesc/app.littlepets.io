<template>
    <div>
        <ul role="list"
            class="w-full md:w-2/3 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
            <li v-for="shelter in shelters"
                :key="shelter.id"
                class="relative">
                <a :href="`/refugios-para-animales/${shelter.id}`">
                    <div class="cursor-pointer group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1543413884-807d73cb32d3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "ExploreShelters",
    data() {
        return {
            shelters: [],
        }
    },
    methods: {
        index() {
            axios.get('api/shelters')
                .then(response => {
                    this.shelters = response.data.data
                })
                .catch(error => console.log(error))
        },
    },
    created() {
        this.index()
    }
}
</script>

<style scoped>

</style>
