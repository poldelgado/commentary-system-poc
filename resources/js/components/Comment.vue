<template>
    <div class="row">
        <div class="commented-section mt-2">
            <div class="align-items-center commented-user">
                <h5 class="mr-2">{{comment.username}}</h5>{{comment.created_at}}
            </div>
            <div class="comment-text-sm">
                <span>{{comment.comment}}</span>
            </div>
            <div
                class="reply-section">
                <div class="align-items-center">
                    <button v-if="comment.depth < 3"
                        class="btn btn-sm btn btn-outline-primary ml-3 mt-1"
                        @click.prevent="reply">
                        Reply
                    </button>
                    <div v-if="comment.replies" class="replies">
                        <template v-for="replie in comment.replies" :key="replie.id">
                            <Comment :comment="replie" />
                        </template>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    props: {
        comment: {
            type: Object,
            required: true,
        },
    },
    methods: {
        reply() {
            this.$root.showModal(this.comment)
        }
    },
}
</script>
<style scoped>
    .replies {
        margin-left: 4em;
    }
</style>
