<template>
    <div>
        <div class="float-right pt-2 position-relative">
            <div v-if="navegacao" class="mr-2">
                <div v-if="logado">
                    <router-link :to="{ name: 'Home' }" class="mr-2 text-secondary"><u>Sistema</u></router-link>
                </div>
                <div v-else>
                    <router-link :to="{ name: 'Login' }" class="mr-2 text-secondary"><u>Entrar</u></router-link>
                    <router-link :to="{ name: 'Register' }" class="text-secondary"><u>Registrar</u></router-link>
                </div>
            </div>
        </div>
        <div class="">
            <router-view @updateHeaderFalse="navegacao=false" @updateHeaderTrue="navegacao=true" @updateLogadoFalse="logado=false"></router-view>
        </div>
    </div>
</template>

<script>
import Auth from './resources/Auth.js';

    export default {
        data () {
            return {
                logado: false,
                navegacao: true,
            };
        },
        created () {
            this.logado = Auth.check();
        }
    }
</script>
