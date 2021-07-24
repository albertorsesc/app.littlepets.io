<script>
export default {
    name: 'LostPets',
    data() {
        return {
            headerTitle: 'Perdidos y Encontrados',
            activeTab: 'explore-lost-pets',
        }
    },
    components: {
        MyLostPets: () => import(/* webpackChunkName: "my-lost-pets" */ '../../views/LostPets/MyLostPets'),
        ExploreLostPets: () => import(/* webpackChunkName: "explore-lost-pets" */ '../../views/LostPets/ExploreLostPets'),
    }
}
</script>
