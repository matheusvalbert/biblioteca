<template>
    <div>
        <div class="float-right mr-2 pt-2 position-relative">
            <div v-if="logado">
                <router-link :to="{ name: 'Pagina Inicial' }" class="mr-2 text-secondary"><u>Sistema</u></router-link>
            </div>
            <div v-else>
                <router-link :to="{ name: 'Login' }" class="mr-2 text-secondary"><u>Entrar</u></router-link>
                <router-link :to="{ name: 'Register' }" class="text-secondary"><u>Registrar</u></router-link>
            </div>
        </div>
        <div class="bg-dark vh-100">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Auth from './resources/Auth.js';
    export default {
        data () {
            return {
                logado: false
            };
        },
        created () {
            this.logado = Auth.check();
        },
        methods: {

        }
    }
</script>
