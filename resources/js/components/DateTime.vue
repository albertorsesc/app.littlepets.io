<template>
    <datetime v-model="localData"
              type="datetime"
              format="dd-MM-yyyy HH:mm"
              :value-zone="'America/Tijuana'"
              zone="local"
    ></datetime>
</template>

<script>

import { Datetime } from 'vue-datetime'
import { Settings } from 'luxon'
Settings.defaultLocale = 'es'
export default {
    name: 'DateTime',
    props: ['data'],
    data() {
        return {
            localData: this.data,
        }
    },
    components: {
        Datetime
    }
}
</script>
