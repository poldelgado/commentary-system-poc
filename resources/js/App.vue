<template>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">
                <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                    <div class="profile-image">
                        <img class="rounded-circle" src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" width="70">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <div class="d-flex flex-row post-title">
                            <h5>I will be in your team?</h5><span class="ml-2">(Poldelgado)</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-justify ml-3">
                    <div class="d-flex flex-column ml justify-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ipsum orci, sollicitudin ultrices varius id, dictum a nisi. Nunc lacinia nec dui sed congue. Praesent bibendum turpis nisi, non auctor libero bibendum non. Vivamus suscipit lectus id metus molestie blandit. Aenean malesuada, massa vel tristique fringilla, ante risus scelerisque sem, vel bibendum tortor urna at leo. Morbi pellentesque fringilla suscipit. Donec id tristique turpis. Vivamus vestibulum convallis lacus, nec dignissim dui. Donec id leo consequat, tempus risus mollis, sagittis enim.</p>
                        <p>Nullam lectus neque, consequat et magna eu, iaculis sollicitudin urna. Nam sodales dignissim ligula, et molestie odio tincidunt a. Praesent hendrerit non ligula non eleifend. Sed semper, arcu ut semper gravida, diam magna convallis lacus, nec interdum magna nibh id orci. Nullam ultrices tincidunt erat consequat consequat. Nam euismod massa at dapibus consectetur. Donec cursus eu nibh a facilisis. Nulla mollis lectus mi, et faucibus ante dapibus et. Maecenas tempus leo eros, quis mollis ipsum scelerisque accumsan. Mauris feugiat magna mollis ullamcorper aliquam. Donec molestie libero eget nisl congue, ac rhoncus mauris sodales.</p>
                        <p>Etiam at lacinia erat. Aliquam erat volutpat. Phasellus aliquam vitae nisi a laoreet. Morbi in ultricies dui. Phasellus lacinia diam nisl. Donec a massa sed metus aliquet scelerisque. Suspendisse laoreet, ipsum ac eleifend vestibulum, justo orci dictum ligula, quis consequat ex libero et nibh. In auctor ornare nibh vel lobortis. Suspendisse potenti.</p>
                    </div>
                </div>
                <CommentForm />
                <div v-for="comment in comments" :key="comment.id">
                    <Comment :comment="comment" />
                </div>
                <modal-reply
                    idmodal="modalreply"
                    title="Repply Comment"
                    ref="modalReply">
                    <CommentForm ref="replyForm" :parent_comment="selectedComment"/>
                </modal-reply>
            </div>
        </div>
    </div>
</template>
<script>
import Comment from './components/Comment.vue'
import CommentForm from './components/CommentForm.vue';
import ModalReply from './components/Modal.vue';
export default {
    components: {
    Comment,
    CommentForm,
    ModalReply,
},
    data() {
        return {
            selectedComment: null,
            comments: [],
            errors: {},
        };
    },
    methods: {
        /**
         * Load all the comments.
         */
        getComments() {
            const url = baseURL+'/api/comment';
            axios.get(url)
                .then(response => {
                    this.comments = response.data.data;
            });
        },
        /**
         * Prepare and show the modal for reply a comment
         */
        showModal(comment) {
            this.selectedComment = comment;
            this.$refs.replyForm.cleanFields();
            this.$refs.modalReply.showModal();
        },
        /**
         * Hide and clean the modal for reply a comment
         */
        hideModal() {
            this.$refs.modalReply.hideModal();
            this.$refs.replyForm.cleanFields();
            this.selectedComment = null;
        },
    },
    created() {
        this.getComments();
    }
};
</script>
<style scoped>
    .bdge {
        height: 21px;
        background-color: orange;
        color: #fff;
        font-size: 11px;
        padding: 8px;
        border-radius: 4px;
        line-height: 3px;
        }

    .comments {
        text-decoration: underline;
        text-underline-position: under;
        cursor: pointer;
    }
</style>
