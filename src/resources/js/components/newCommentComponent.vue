<template>
<div>
    <h4>Realizar comentário:</h4>
    <div class="container">
        <form action="javascript:void(0)" method="post">
            <div class="form-group">
                <label for="name" class="font-weight-bold">Título:</label>
                <input type="text" v-model="comment.title" name="name" id="name" class="form-control" placeholder="Digite o título">
            </div>
            <div class="form-group">
                <label for="descricao" class="font-weight-bold">Comentário:</label>
                <textarea type="text" v-model="comment.comment" name="descricao" id="descricao" class="form-control" placeholder="Digite o comentário"></textarea>
            </div>
            <div class="form-group text-right">
                <button type="submit" :disabled="processing" @click="onSubmit" class="btn btn-primary">
                    {{ processing ? "Por favor, aguarde..." : "Comentar" }}
                </button>
            </div>
        </form>
    </div>
</div>
</template>

<script>
export default {
    props: {
        book_id: {
            required: true,
            default: ''
        }
    },
    data() {
        return {
            processing: false,
            comment: {
                title: '',
                comment: '',
                book_id: ''
            }
        }
    },
    methods: {
        onSubmit () {
            this.processing = true
            this.comment.book_id = this.book_id;
            this.axios.post('/api/comments/store', this.comment)
                .then(res => {
                    this.$emit('updateComments');
                    this.comment = {};
                })
                .catch((error) => {
                    alert(error);
                })
                .finally(() => {
                    this.processing = false
                });
        }
    },
}
</script>

<style scoped>

</style>
