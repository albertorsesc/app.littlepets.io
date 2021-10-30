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
            localOrganization: this.organization,

            activeTab: 'profile',
            showForm: false,
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
    },
    created() {
        window.Event.$on('adoption-form:store', () => {
            this.showForm = false
        })
    },
    components: {
        Slider: () => import(/* webpackChunkName: "slider" */ '../../components/Slider'),
        PetList: () => import(/* webpackChunkName: "pet-list" */ '../../components/Pets/PetList'),
        CreateAdoption: () => import(/* webpackChunkName: "create-adoption" */ '../../views/Adoptions/CreateAdoption'),
    }
}
</script>
