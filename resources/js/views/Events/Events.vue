<script>
export default {
    data() {
        return {
            headerTitle: 'Eventos',
            activeTab: 'explore-events',
        }
    },
    watch: {
        activeTab() {
            if (this.activeTab === 'explore-events') {
                this.headerTitle = 'Eventos'
            }
            if (this.activeTab === 'my-events') {
                this.headerTitle = 'Mis Eventos'
            }
            if (this.activeTab === 'interesting-events') {
                this.headerTitle = 'Mis Intereses'
            }
            if (this.activeTab === 'search-events') {
                this.headerTitle = 'Búsqueda Avanzada de Eventos'
            }
        },
    },
    components: {
        MyEvents: () => import(/* webpackChunkName: "my-events" */ '../../views/Events/MyEvents'),
        ExploreEvents: () => import(/* webpackChunkName: "explore-events" */ '../../views/Events/ExploreEvents'),
    }
}
</script>
