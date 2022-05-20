<template>
<div class="pb-2">
    <logged-header :user="user" @updateHeaderTrue="updateHeaderTrue"></logged-header>
    <layout-component>
        <div class="card-header">
            <h3>Adicionar novo Livro</h3>
        </div>
        <div class="container pt-2 mb-2">
            <book-form
                :processing="processing"
                :book="book"
                :buttonText="'Adicionar Livro'"
                @form="addBook">
            </book-form>
        </div>
    </layout-component>
</div>
</template>

<script>
import LayoutComponent from '../general/LayoutComponent.vue';
import LoggedHeader from '../general/LoggedHeader.vue';
import BookForm from '../general/BookForm.vue';

    export default {
        components: {
            LayoutComponent,
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
                    pages: '',
                    image: ''
                }
            }
        },
        created () {
            this.$emit('updateHeaderFalse');
        },
        methods: {

            generateFormData () {
                const formData = new FormData;
                formData.set('image', this.book.image);
                formData.set('name', this.book.name);
                formData.set('description', this.book.description);
                formData.set('pages', this.book.pages);
                return formData;
            },

            addBook () {
                this.processing = true
                const formData = this.generateFormData();
                this.axios.post('/api/books', formData)
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
