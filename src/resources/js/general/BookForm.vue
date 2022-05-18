<template>
<form action="javascript:void(0)" class="row" method="post">
    <div class="form-group col-12">
        <label for="name" class="font-weight-bold">Nome do livro:</label>
        <input type="text" v-model="book.name" name="name" id="name" class="form-control" placeholder="Digite o nome">
    </div>
    <div class="form-group col-12">
        <label for="descricao" class="font-weight-bold">Descrição do livro:</label>
        <textarea type="text" v-model="book.description" name="descricao" id="descricao" class="form-control" placeholder="Digite a descrição"></textarea>
    </div>
    <div class="form-group col-12">
        <label for="paginas" class="font-weight-bold">Número de páginas:</label>
        <input type="number" v-model="book.pages" name="paginas" id="paginas" class="form-control" placeholder="Digite o número de páginas">
    </div>
    <div class="form-group col-12">
        <label for="image" class="font-weight-bold">Imagem:</label>
        <input type="file" @change="handleOnchange" name="image" id="image" class="form-control">
    </div>
    <div class="col-12 mb-2">
        <button type="submit" :disabled="processing" @click="onSubmit" class="btn btn-primary btn-block">
            {{ processing ? "Por favor, aguarde..." : buttonText }}
        </button>
    </div>
</form>
</template>

<script>
export default {
    props: {
        book: {
            name: '',
            description: '',
            pages: '',
            image: '',
        },
        processing: {
            type: Boolean,
            required: true,
            default: false
        },
        buttonText: {
            type: String,
            required: false,
            default: ''
        }
    },
    data() {
        return {
        }
    },
    created() {
    },
    methods: {

        handleOnchange (e) {
            this.book.image = e.target.files[0];
        },

        onSubmit () {
            this.$emit('form');
        }
    },
}
</script>

<style scoped>

</style>
