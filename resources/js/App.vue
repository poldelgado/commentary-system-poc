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
                <modal-reply idmodal="modalreply" title="Repply Comment">
                    <CommentForm />
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
            comments: [
                {
                    id: 1,
                    comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..',
                    username: 'poldelgado',
                    depth: 0,
                    replies: [],
                },
                {
                    id: 2,
                    comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..',
                    username: 'solepetrino',
                    depth: 0,
                    replies: [],
                },
                {
                    id: 2,
                    comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..',
                    username: 'jperez',
                    depth: 0,
                    replies: [],
                },
                {
                    id: 2,
                    comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..',
                    username: 'johndoe99',
                    depth: 0,
                    replies: [],
                },
            ],
        };
    },
};
</script>
