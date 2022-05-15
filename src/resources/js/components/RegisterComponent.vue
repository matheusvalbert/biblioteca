<template>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Registrar</h1>
                        <hr/>
                        <form action="javascript:void(0)" @submit="register" class="row" method="post">
                            <div class="form-group col-12">
                                <label for="name" class="font-weight-bold">Nome:</label>
                                <input type="text" name="name" v-model="user.name" id="name" placeholder="digite o nome" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email:</label>
                                <input type="text" name="email" v-model="user.email" id="email" placeholder="digite o email" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password" class="font-weight-bold">Senha:</label>
                                <input type="password" name="password" v-model="user.password" id="password" placeholder="digite a senha" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password_confirmation" class="font-weight-bold">Confirmação da senha:</label>
                                <input type="password" name="password_confirmation" v-model="user.password_confirmation" id="password_confirmation" placeholder="digite a senha novamente" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" :disabled="processing" class="btn btn-primary btn-block">
                                    {{ processing ? "Por favor, aguarde..." : "Registrar" }}
                                </button>
                            </div>
                            <div class="col-12 text-center">
                                <label>Já possui conta? <router-link :to="{name:'Login'}">Entre agora!</router-link></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Auth from '../resources/Auth';
    export default {
        data() {
            return {
                user: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                auth: {
                    email: '',
                    password: ''
                },
                processing: false,
                logado: false,
            };
        },
        created () {
            this.logado = Auth.check();
            if(this.logado)
                this.pushHome();
        },
        methods: {
            register () {
                this.processing = true;
                this.axios.post('/api/register', this.user)
                    .then(({data}) => {
                        this.auth.email = this.user.email;
                        this.auth.password = this.user.password;
                        if (this.auth.email != '' && this.auth.password != '')
                        this.login();
                    })
                    .catch((error) => {
                        alert(error);
                    });
            },
            login () {
                this.axios.post('/api/login', this.auth)
                    .then(({data}) => {
                        Auth.login(data.access_token, data.user);
                        this.pushHome();
                    })
                    .catch((error) => {
                        alert(error);
                    })
                    .finally(() => {
                        this.processing = false;
                    });
            },
            pushHome() {
                this.$router.push({ name: 'Home' });
            }
        }
    }
</script>
