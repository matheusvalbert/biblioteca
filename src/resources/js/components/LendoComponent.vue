<template>
<div>
    <logged-header :user="user" @updateHeaderTrue="updateHeaderTrue"></logged-header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>Lendo</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import LoggedHeader from '../general/LoggedHeader.vue';

export default {
    components: {
        LoggedHeader
    },
    data() {
        return {
            user: this.auth.user,
        }
    },
    created () {
            this.$emit('updateHeaderFalse');
    },
    methods: {
        updateHeaderTrue () {
            this.$emit('updateLogadoFalse');
            this.$emit('updateHeaderTrue');
        },
    },
}
</script>

<style scoped>

</style>
