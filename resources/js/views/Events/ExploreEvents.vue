<template>
    <div class="relative pb-20  lg:pb-28">
        <div class="absolute inset-0">
            <div class="h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative w-full">
            <div class="mt-8 grid gap-8 lg:grid-cols-2 ">
                <event-card v-for="event in events"
                            :key="event.id"
                            :event="event"
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ExploreEvents",
    data() {
        return {
            events: [],
        }
    },
    methods: {
        index() {
            axios.get('events')
                .then(response => {
                    this.events = response.data.data
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    mounted() {
        this.index()
    },
    components: {
        EventCard: () => import(/* webpackChunkName: "event-card" */ '../../components/Events/EventCard'),
    }
}
</script>

<style scoped>

</style>
