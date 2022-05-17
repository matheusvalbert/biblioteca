<template>
<div>
    <hr>
        <new-comment-component :book_id="id" v-if="id" @updateComments="getComments"></new-comment-component>
    <hr>
    <h4>Comentários:</h4>
    <div class="container">
        <div v-for="(comment, index) in comments.data" :key="index">
            <div class="row">
                <div class="col-12">
                    <label for="name" class="font-weight-bold">Nome:</label>
                    {{ comment.user }}
                </div>
                <div class="col-12">
                    <label for="name" class="font-weight-bold">Título comentário:</label>
                    {{ comment.title }}
                </div>
                <div class="col-12">
                    <label for="descrição" class="font-weight-bold">Comentário:</label>
                    {{ comment.comment }}
                </div>
            </div>
            <hr>
        </div>
        <pagination-component class="d-flex justify-content-center" :pagination="comments" @paginate="getComments"></pagination-component>
    </div>
</div>
</template>

<script>
import PaginationComponent from '../general/PaginationComponent.vue';
import NewCommentComponent from './newCommentComponent.vue';

export default {
    props: {
        id: {
            required: true,
            default: ''
        }
    },
    components: {
        PaginationComponent,
        NewCommentComponent
    },
    data() {
        return {
            comments: {
                meta: [],
                data: []
            }
        }
    },
    created() {
        this.getComments();
    },
    methods: {
        getComments () {
            this.axios.get(`/api/comments/${this.id}?page=${this.comments.meta.current_page}`)
                .then(res => {
                    this.comments = res.data;
                })
                .catch(err => {
                    alert(err);
                });
        }
    },
}
</script>

<style scoped>

</style>
