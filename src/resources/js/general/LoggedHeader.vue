<template>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <router-link :to="{ name: 'Home' }" class="navbar-brand"><strong>Biblioteca</strong></router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <router-link :to="{ name: 'Home' }" class="nav-link">Livros</router-link>
                </li>
            </ul>
            <div class="ml-auto">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ user.name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
</template>

<script>
import Auth from '../resources/Auth';

export default {
    props: {
        user: {
            type: Object,
            required: true,
            default: {}
        }
    },
    methods: {
        logout() {
            this.axios.post('/api/logout')
                .then(({data}) => {
                    Auth.logout();
                    this.$emit('updateHeaderTrue');
                    this.$router.push({ name: 'MainPage' });
                })
                .catch((error) => {
                    alert(error);
                });
            }
    }
}
</script>

<style scoped>

</style>
