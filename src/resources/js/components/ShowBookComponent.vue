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
            book: {}
        }
    },
    created () {
        this.$emit('updateHeaderFalse');
        this.getBook();
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
