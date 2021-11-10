<script>
export default {
    props: {
        activities: {
            required: true,
        }
    },
    data() {
        return {
            localActivities: this.activities,
        }
    },
    components: {
        VeterinaryCard: () => import(/* webpackChunkName: "veterinary-card" */ '../../components/Veterinaries/VeterinaryCard'),
    }
}
</script>
