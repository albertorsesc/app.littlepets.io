<script>
export default {
    name: 'Veterinaries',
    data() {
        return {
            headerTitle: 'Veterinarias',
            activeTab: 'explore-veterinaries',
        }
    },
    watch: {
        activeTab() {
            if (this.activeTab === 'explore-veterinaries') {
                this.headerTitle = 'Veterinarias'
            }
            if (this.activeTab === 'my-veterinaries') {
                this.headerTitle = 'Mis Veterinarias'
            }
            if (this.activeTab === 'interesting-veterinaries') {
                this.headerTitle = 'Mis Intereses'
            }
            if (this.activeTab === 'search-veterinaries') {
                this.headerTitle = 'Búsqueda Avanzada de Veterinarias'
            }
        }
    },
    components: {
        MyVeterinaries: () => import(/* webpackChunkName: "my-veterinaries" */ '../../views/Veterinaries/MyVeterinaries'),
        CreateVeterinary: () => import(/* webpackChunkName: "create-veterinary" */ '../../views/Veterinaries/CreateVeterinary'),
        ExploreVeterinaries: () => import(/* webpackChunkName: "explore-veterinaries" */ '../../views/Veterinaries/ExploreVeterinaries'),
    }
}
</script>
