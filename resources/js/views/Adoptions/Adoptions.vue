
<script>

export default {
    data() {
        return {
            headerTitle: 'Adopciones',
            activeTab: 'explore-adoptions',

            isFormShown: false,
            isSlideOverShown: false,
        }
    },
    watch: {
        activeTab() {
            if (this.activeTab === 'explore-adoptions') {
                this.headerTitle = 'Adopciones'
            }
            if (this.activeTab === 'my-adoptions') {
                this.headerTitle = 'Mis Adopciones'
            }
            if (this.activeTab === 'interesting-adoptions') {
                this.headerTitle = 'Mis Intereses'
            }
            if (this.activeTab === 'search-adoptions') {
                this.headerTitle = 'Búsqueda Avanzada de Mascotas'
            }
        }
    },
    components: {
        MyAdoptions: () => import(/* webpackChunkName: "my-adoptions" */ '../../views/Adoptions/MyAdoptions'),
        ExploreAdoptions: () => import(/* webpackChunkName: "explore-adoption" */ '../../views/Adoptions/ExploreAdoptions'),
    }
}
</script>
