<template>
    <div v-if="error"
         v-text="error[0]"
         class="text-sm text-red-700"
    ></div>
</template>

<script>
export default {
    name: 'Errors',
    props: {
        error: {
            required: true
        },
    }
}
</script>
