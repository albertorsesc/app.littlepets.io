<script>
export default {
    name: 'OrganizationSettings',
    props: {
        organization: {
            required: true,
            type: Object,
        }
    },
    provide() {
        return {
            organization: this.localOrganization,
        }
    },
    data() {
        return {
            headerTitle: this.organization.name,
            activeTab: 'profile',

            localOrganization: this.organization,
        }
    },
    watch: {
        activeTab() {
            if (this.activeTab === 'profile') {
                this.headerTitle = 'Datos de la Organizacion'
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
