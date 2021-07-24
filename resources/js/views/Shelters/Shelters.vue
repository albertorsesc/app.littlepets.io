<script>
import MyShelters from "./MyShelters";
import ExploreShelters from "./ExploreShelters";

export default {
    name: 'Shelters',
    data() {
        return {
            headerTitle: 'Refugios para Animales',
            activeTab: 'explore-shelters',
        }
    },
    components: {
        MyShelters,
        ExploreShelters,
    }
}
</script>
