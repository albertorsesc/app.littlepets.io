<script>
export default {
    name: 'OrganizationSettings',
    data() {
        return {
            headerTitle: 'Perfil',
            activeTab: 'profile',
        }
    },
    watch: {
        activeTab() {
            if (this.activeTab === 'profile') {
                this.headerTitle = 'Perfil'
            }
            if (this.activeTab === 'members') {
                this.headerTitle = 'Miembros de la Organizacion'
            }
        }
    },
    components: {
        Members: () => import(/* webpackChunkName: "update-organization" */ './Members'),
        UpdateOrganization: () => import(/* webpackChunkName: "update-organization" */ './UpdateOrganization'),
    }
}
</script>
