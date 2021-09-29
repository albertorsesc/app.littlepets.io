<template>
    <div class="my-8">
        <div class="items-center flex justify-start" v-cloak>
            <button @click="showForm = ! showForm" class="lp-btn">
                <span v-if="! showForm">Registra un nuevo evento</span>
                <span v-if="showForm">Regresar</span>
            </button>
        </div>

        <div v-show="showForm" class="w-full my-8">
            <create-event />
        </div>

        <div v-show="! showForm" class="relative pb-20 lg:pb-28">
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

    </div>
</template>

<script>
export default {
    name: "MyEvents",
    data() {
        return {
            events: [],
            showForm: false
        }
    },
    methods: {
        index() {
            axios.get('my-events')
            .then(response => {
                this.events = response.data.data
            })
            .catch(error => {
                dd(error)
            })
        },
    },
    created() {
        this.index()

        window.Event.$on('event-form:store', newEvent => {
            this.events.unshift(newEvent)
            this.showForm = false
        })
    },
    components: {
        EventCard: () => import(/* webpackChunkName: "event-card" */ '../../components/Events/EventCard'),
        CreateEvent: () => import(/* webpackChunkName: "create-event" */ '../../views/Events/CreateEvent'),
    }
}
</script>
