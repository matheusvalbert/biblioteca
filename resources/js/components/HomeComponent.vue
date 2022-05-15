<template>
<div>
    <logged-header :user="user" @updateHeaderTrue="updateHeaderTrue"></logged-header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Livros</h3>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">You are logged in as <b>{{user.email}}</b></p>
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
        data () {
            return {
                user: this.auth.user,
                logado: false
            }
        },
        created () {
            this.$emit('updateHeaderFalse');
        },
        methods: {
            updateHeaderTrue() {
                this.$emit('updateLogadoFalse');
                this.$emit('updateHeaderTrue');
            }
        }
    }
</script>
