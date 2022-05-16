<template>
<div class="h-100 pb-2">
    <logged-header :user="user" @updateHeaderTrue="updateHeaderTrue"></logged-header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>Livros</h3>
                            <a href="#" @click.prevent="pushAddBook" class="btn btn-primary float-right">Adicionar Livro</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>Nome</th>
                                    <th width="200">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(book, index) in books.data" :key="index">
                                    <td>{{ book.id }}</td>
                                    <td>
                                        <router-link :to="{ name: 'BookShow', params: { id: book.id } }">
                                        {{ book.name }}
                                        </router-link>
                                    </td>
                                    <td>
                                        <router-link :to="{ name: 'BookEdit', params: { id: book.id } }" class="btn btn-info">Editar</router-link>
                                        <a href="#" class="btn btn-danger">Deletar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <p class="mb-0">You are logged in as <b>{{user.email}}</b></p>
                        <button class="btn btn-primary mt-2" @click="data">View user data</button> -->
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
                books: {
                    data: []
                }
            }
        },
        created () {
            this.$emit('updateHeaderFalse');
            this.getBooks();
        },
        methods: {

            pushAddBook () {
                this.$router.push({ name: 'BookCreate' });
            },

            getBooks () {
                this.axios.get('/api/books')
                    .then(res => {
                        this.books = res.data;
                    })
                    .catch(err => {
                        alert(err);
                    })
            },

            // ---------

            updateHeaderTrue () {
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
