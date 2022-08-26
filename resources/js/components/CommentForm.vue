<template>
    <div class="coment-bottom bg-white p-2 px-4">
        <form
            @submit.prevent="submit">
            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                <input type="text"
                    class="form-control mr-3"
                    placeholder="Username"
                    v-model="formInputs.username"
                    />
            </div>
            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                <textarea
                    class="form-control"
                    placeholder="Add your comment"
                    v-model="formInputs.comment"
                ></textarea>
            </div>
            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                <button class="btn btn-primary ml-5" type="submit">{{buttonText}}</button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    props: {
        parent_comment: {
            type: Object,
            required: false,
        }
    },
    data() {
        return {
            formInputs: {
                username: null,
                comment: null,
            },
        };
    },
    computed: {
        buttonText() {
            return !this.parent_comment ? 'Add Comment':'Add Repply'
        }
    },
    methods: {
        submit() {
            let url=baseURL+'/api/comment';
            let formData = new FormData();
            formData.append('username',this.formInputs.username);
            formData.append('comment',this.formInputs.comment);
            if (this.parent_comment) {
                formData.append('depth',this.parent_comment.depth+1);
                formData.append('parent_id',this.parent_comment.id);
                url = url+'/reply';
            }
            axios.post(url, formData)
                .then(response => {
                    this.cleanFields();
                    if (this.parent_comment) {
                        this.addRepply(response.data.reply);
                        this.$root.hideModal();
                    } else {
                        this.addComment(response.data.comment);
                    }
                });
        },
        cleanFields()
        {
            this.formInputs.username = null;
            this.formInputs.comment = null;
        },
        addComment(comment) {
            this.$root.comments.unshift(comment);
        },
        addRepply(comment) {
            this.$root.selectedComment.replies.unshift(comment);
        }
    }
}
</script>
