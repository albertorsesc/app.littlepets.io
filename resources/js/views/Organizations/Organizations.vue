<script>
export default {
    name: 'Organizations',
    data() {
        return {
            headerTitle: 'Organizaciones',
            activeTab: 'explore-organizations',
        }
    },
    watch: {
        activeTab() {
            if (this.activeTab === 'explore-organizations') {
                this.headerTitle = 'Organizaciones'
            }
            if (this.activeTab === 'my-organizations') {
                this.headerTitle = 'Mis Organizaciones'
            }
            if (this.activeTab === 'interesting-organizations') {
                this.headerTitle = 'Mis Intereses'
            }
            if (this.activeTab === 'search-organizations') {
                this.headerTitle = 'Búsqueda Avanzada de Organizaciones'
            }
        }
    },
    components: {
        MyOrganization: () => import(/* webpackChunkName: "my-organization" */ '../../views/Organizations/MyOrganization'),
        // CreateVeterinary: () => import(/* webpackChunkName: "create-veterinary" */ '../../views/Organizations/CreateVeterinary'),
        // ExploreOrganizations: () => import(/* webpackChunkName: "explore-organizations" */ '../../views/Organizations/ExploreOrganizations'),
    }
}
</script>
