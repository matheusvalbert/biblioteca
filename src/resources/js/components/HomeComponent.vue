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
                        <button class="btn btn-primary mt-2" @click="data">View user data</button>
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
            },
            data() {
                this.axios.get('/api/testando')
                    .then(({data}) => {
                        console.log(data);
                    })
                    .catch((error) => {
                        alert(error);
                    })
            },
        }
    }
</script>
