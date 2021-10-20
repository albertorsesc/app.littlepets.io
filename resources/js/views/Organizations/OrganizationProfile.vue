<script>
export default {
    name: 'OrganizationProfile',
    data() {
        return {
            activeTab: 'profile',
        }
    },
    methods: {
        verify() {
            axios.put('/organizations/verify')
                .then(response => {

                })
                .catch(error => {
                    dd(error)
                })
        }
    }
}
</script>
