<script>
import SweetAlert from "../../models/SweetAlert";

export default {
    name: 'OrganizationProfile',
    props: {
        organization: {
            required: true,
            type: Object,
        }
    },
    data() {
        return {
            activeTab: 'profile',
            localOrganization: this.organization,
        }
    },
    methods: {
        verify() {
            axios.put(`/organizations/${this.organization.slug}/verify`)
                .then(response => {
                    this.localOrganization.meta.verifiedAt = response.data
                    if (this.localOrganization.meta.verifiedAt) {
                        SweetAlert.info(`La Organización ha sido Verificada existosamente!`)
                    } else {
                        SweetAlert.info(`La Organización no ha sido Verificada.`)
                    }
                })
                .catch(error => {
                    dd(error)
                })
        }
    }
}
</script>
