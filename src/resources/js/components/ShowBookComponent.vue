<template>
<div class="h-100 pb-2">
    <logged-header :user="user" @updateHeaderTrue="updateHeaderTrue"></logged-header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>Livro</h3>
                            <div v-if="lerLidoState">
                                <button v-if="lerLidoState!='lido'" :disabled="lerLidoState=='ler'" class="btn btn-primary" @click="lerLido('ler')">Ler</button>
                                <button class="btn btn-primary" :disabled="lerLidoState=='lido'" @click="lerLido('lido')">Lido</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="font-weight-bold">Nome do livro:</label>
                                {{ book.name }}
                            </div>
                            <div class="col-12">
                                <label for="name" class="font-weight-bold">Número de páginas:</label>
                                {{ book.pages }}
                            </div>
                            <div class="col-12">
                                <label for="descrição" class="font-weight-bold">Descrição:</label>
                                {{ book.description }}
                            </div>
                        </div>
                        <comments-component :id="book.id" v-if="book.id"></comments-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import LoggedHeader from '../general/LoggedHeader.vue';
import CommentsComponent from './CommentsComponent.vue';

export default {
    props: {
        id: {
            required: true,
            default: ''
        }
    },

    components: {
        LoggedHeader,
        CommentsComponent
    },
    data () {
        return {
            user: this.auth.user,
            book: {},
            lerLidoState: ''
        }
    },
    created () {
        this.$emit('updateHeaderFalse');
        this.getBook();
        this.getLerLido();
    },
    methods: {

        getBook () {
            this.axios.get(`/api/books/${this.id}`)
                .then(({data}) => {
                    this.book = data.data;
                })
                .catch((error) => {
                    alert(error);
                });
        },

        lerLido (tipo) {
            this.axios.post('/api/book/state', {
                    id: this.id,
                    state: tipo
                })
                .then(res => {
                    this.getLerLido();
                })
                .catch((error) => {
                    alert(error);
                });
        },

        getLerLido () {
            this.axios.get(`/api/book/state/${this.id}`)
                .then(res => {
                    this.lerLidoState = res.data;
                })
                .catch((error) => {
                    alert(error);
                });
        },

        getState () {
            this.axios.delete(`/api/book/state`, {
                id: this.id
            })
                .then(res => {
                    console.log(res.data);
                })
                .catch((error) => {
                    alert(error);
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

<style scoped>

</style>
