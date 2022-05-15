<template>
    <div>
        <div class="float-right mr-2 pt-2 position-relative">
            <router-link :to="{ name: 'Login' }" class="mr-2 text-secondary"><u>Entrar</u></router-link>
            <router-link :to="{ name: 'Register' }" class="text-secondary"><u>Registrar</u></router-link>
        </div>
        <div class="bg-dark vh-100">
        <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Auth from './resources/Auth.js';
    export default {
        data() {
            return {
                loggedUser: this.auth.user
            };
        },
        mounted() {
            console.log(this.auth.user);
        },
        methods: {
            logout() {
                this.axios.post('/api/logout')
                .then(({data}) => {
                    Auth.logout(); //reset local storage
                    this.$router.push('/login');
                })
                .catch((error) => {
                    console.log(error);
                });
            },
        }
    }
</script>
