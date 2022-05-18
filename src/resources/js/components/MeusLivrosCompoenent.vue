<template>
<div>
    <logged-header :user="user" @updateHeaderTrue="updateHeaderTrue"></logged-header>
    <layout-component>
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Meus Livros</h3>
            </div>
        </div>
            <div class="col pt-3">
                <book-search-component @search="searchBook"></book-search-component>
            </div>
            <div class="card-body">
                <delete-component :confirmDelete="confirmDelete"
                    :text="'Deseja realmente remover dos seus livros?'" :textButton="'Remover'"
                    @apagar="deleteBook">
                </delete-component>
                <table class="table">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Nome</th>
                        <th width="500">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(book, index) in books.data" :key="index">
                        <td>{{ book.id }}</td>
                        <td>{{ book.name }}</td>
                        <td>
                            <button @click="lerLido(book.id, 'ler')" :disabled="book.state=='ler'"
                                class="btn btn-info mb-1">Marcar como lendo
                            </button>
                            <button @click="lerLido(book.id, 'lido')" :disabled="book.state=='lido'"
                                class="btn btn-info mb-1">Marcar como lido
                            </button>
                            <button @click="prepareToDelete(book.id)"
                                class="btn btn-danger mb-1">Remover da lista
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <pagination-component :pagination="books" @paginate="getBooks"></pagination-component>
            </div>
        </div>
    </layout-component>
</div>
</template>

<script>
import LayoutComponent from '../general/LayoutComponent.vue';
import LoggedHeader from '../general/LoggedHeader.vue';
import BookSearchComponent from '../general/BookSearchComponent.vue';
import PaginationComponent from '../general/PaginationComponent.vue';
import DeleteComponent from '../general/DeleteComponent.vue';

export default {
    components: {
        LayoutComponent,
        LoggedHeader,
        BookSearchComponent,
        PaginationComponent,
        DeleteComponent
    },
    data() {
        return {
            user: this.auth.user,
            books: {
                meta: {
                    current_page: 1
                },
                data: []
            },
            filter: '',
            confirmDelete: false,
            idToDelete: ''
        }
    },
    created () {
        this.$emit('updateHeaderFalse');
        this.getBooks();
    },
    methods: {

        deleteBook () {
            this.axios.delete(`/api/books/state/${this.idToDelete}`)
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

        searchBook (filter) {
            this.filter = filter;
            this.getBooks();
        },

        updateHeaderTrue () {
            this.$emit('updateLogadoFalse');
            this.$emit('updateHeaderTrue');
        },

        getBooks () {
            this.axios.get(`/api/books/state?page=${this.books.meta.current_page ?? 1}&filter=${this.filter}`)
                .then(res => {
                    this.books = res.data;
                })
                .catch(err => {
                    alert(err);
                })
        },

        lerLido (id, tipo) {
            this.axios.post('/api/books/state', {
                    id: id,
                    state: tipo
                })
                .then(res => {
                    this.getBooks();
                })
                .catch((error) => {
                    alert(error);
                });
        },
    },
}
</script>

<style scoped>

</style>
