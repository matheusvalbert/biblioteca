<template>
<div class="alert alert-danger text-center" v-show="confirmDelete">
    <h2>{{ text }}</h2>
    <hr>
    <button class="btn btn-danger" @click.prevent="onSubmit">{{ textButton }}</button>
</div>
</template>

<script>
export default {
    props: {
        text: {
            required: true,
            type: String,
            default: ''
        },
        textButton: {
            required: true,
            type: String,
            default: ''
        },
        confirmDelete: {}
    },
    data() {
        return {

        }
    },
    methods: {
        onSubmit () {
            this.$emit('apagar');
        }
    },
}
</script>

<style scoped>

</style>
