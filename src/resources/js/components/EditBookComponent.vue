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
                        <book-form
                            :processing="processing"
                            :book="book"
                            :buttonText="'Atualizar Livro'"
                            @form="updateBook">
                        </book-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import LoggedHeader from '../general/LoggedHeader.vue';
import BookForm from '../general/BookForm.vue';

    export default {
        props: {
            id: {
                required: true,
                default: ''
            }
        },
        components: {
            LoggedHeader,
            BookForm
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

            updateBook () {
                this.processing = true
                this.axios.put(`/api/books/${this.book.id}`, this.book)
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
