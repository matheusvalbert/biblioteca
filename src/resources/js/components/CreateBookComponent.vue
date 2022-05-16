<template>
<div class="pb-2">
    <logged-header :user="user" @updateHeaderTrue="updateHeaderTrue"></logged-header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Adicionar novo Livro</h3>
                    </div>
                    <div class="container pt-2 mb-2">
                        <form action="javascript:void(0)" class="row" method="post">
                            <div class="form-group col-12">
                                <label for="name" class="font-weight-bold">Nome do livro:</label>
                                <input type="text" v-model="book.name" name="name" id="name" class="form-control" placeholder="Digite o nome">
                            </div>
                            <div class="form-group col-12">
                                <label for="descricao" class="font-weight-bold">Descrição do livro:</label>
                                <textarea type="text" v-model="book.description" name="descricao" id="descricao" class="form-control" placeholder="Digite o nome"></textarea>
                            </div>
                            <div class="form-group col-12">
                                <label for="paginas" class="font-weight-bold">Número de páginas:</label>
                                <input type="number" v-model="book.pages" name="paginas" id="paginas" class="form-control" placeholder="Digite o número de páginas">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" :disabled="processing" @click="addBook" class="btn btn-primary btn-block">
                                    {{ processing ? "Por favor, aguarde..." : "Adicionar Livro" }}
                                </button>
                            </div>
                        </form>
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
                processing: false,
                book: {
                    name: '',
                    description: '',
                    pages: ''
                }
            }
        },
        created () {
            this.$emit('updateHeaderFalse');
        },
        methods: {

            addBook () {
                this.processing = true
                this.axios.post('/api/books/store', this.book)
                    .then(({data}) => {
                        this.$router.push({ name: 'Home' });
                    })
                    .catch((error) => {
                        alert(error);
                    })
                    .finally(() => {
                        this.processing = false
                    });
            },

            // ---------

            updateHeaderTrue () {
                this.$emit('updateLogadoFalse');
                this.$emit('updateHeaderTrue');
            },
        }
    }
</script>
