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
                    <div class="col pt-3">
                        <book-search-component @search="searchBook"></book-search-component>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger text-center" v-show="confirmDelete">
                            <h2>Deseja realmente deletar?</h2>
                            <hr>
                            <button class="btn btn-danger" @click.prevent="deleteBook">Deletar Agora</button>
                        </div>
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
                                        <a href="#" @click.prevent="prepareToDelete(book.id)" class="btn btn-danger">Deletar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <p class="mb-0">You are logged in as <b>{{user.email}}</b></p>
                        <button class="btn btn-primary mt-2" @click="data">View user data</button> -->
                        <div class="d-flex justify-content-center">
                            <pagination-component :pagination="books" @paginate="getBooks"></pagination-component>
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
import BookSearchComponent from '../general/BookSearchComponent.vue';
import PaginationComponent from '../general/PaginationComponent.vue';

    export default {
        components: {
            LoggedHeader,
            PaginationComponent,
            BookSearchComponent
        },
        data () {
            return {
                user: this.auth.user,
                books: {
                    meta: {
                        current_page: 1
                    },
                    data: []
                },
                confirmDelete: false,
                idToDelete: '',
                filter: ''
            }
        },
        created () {
            this.$emit('updateHeaderFalse');
            this.getBooks();
        },
        methods: {

            deleteBook () {
                this.axios.delete(`/api/books/${this.idToDelete}`)
                    .then(res => {
                        this.confirmDelete = false;
                        this.idToDelete = 0;
                        this.getBooks();
                    })
                    .catch(err => {
                        alert(err);
                    });
            },

            prepareToDelete(id) {
                this.confirmDelete = true,
                this.idToDelete = id;
            },

            pushAddBook () {
                this.$router.push({ name: 'BookCreate' });
            },

            getBooks () {
                this.axios.get(`/api/books?page=${this.books.meta.current_page ?? 1}&filter=${this.filter}`)
                    .then(res => {
                        this.books = res.data;
                        console.log(this.books);
                    })
                    .catch(err => {
                        alert(err);
                    })
            },

            searchBook (filter) {
                this.filter = filter;
                this.getBooks();
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
