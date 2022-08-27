<template>
    <div class="coment-bottom bg-white p-2 px-4">
        <form
            @submit.prevent="submit">
            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                <input type="text"
                    class="form-control mr-3"
                    :class="invalidInputClass('username')"
                    placeholder="Username"
                    v-model="formInputs.username"
                    />
            </div>
            <InputError v-if="isErrors('username')"
                :errors="errors.username"
            />
            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                <textarea
                    class="form-control"
                    :class="invalidInputClass('comment')"
                    placeholder="Add your comment"
                    v-model="formInputs.comment"

                ></textarea>
            </div>
            <InputError v-if="isErrors('comment')"
                :errors="errors.comment"
            />
            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                <button class="btn btn-primary ml-5" type="submit">{{buttonText}}</button>
            </div>
        </form>
    </div>
</template>
<script>
import InputError from './InputError.vue';
export default {
    components: {
        InputError,
    },
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
            errors: {},
        };
    },
    computed: {
        buttonText() {
            return !this.parent_comment ? 'Add Comment':'Add Repply'
        }
    },
    methods: {
        /**
         * Store the comments
         */
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
                })
                .catch(error => {
                        console.log("error!");
                        console.log(error.response.data.errors);
                        this.errors = error.response.data.errors;
                    });
        },
        /**
         *
         * @param {*} input
         * Check if input property returns error
         */
        isErrors(input) {
            return this.errors.hasOwnProperty(input);
        },
        /**
         * @param {String} input
         * Add bs5 error class to input
         */
        invalidInputClass(input) {
            if (this.isErrors(input)) {
                return 'is-invalid red';
            }
            return '';
        },
        /**
         * Clean the Errors Object
         */
        cleanErrors() {
            delete this.errors['comment'];
            delete this.errors['username'];
        },
        /**
         * Clean the form inputs fields.
         */
        cleanFields()
        {
            this.formInputs.username = null;
            this.formInputs.comment = null;
            this.cleanErrors();
        },
        /**
         *
         * @param {Object} comment
         * Add a new comment to the array of comments.
         */
        addComment(comment) {
            this.$root.comments.unshift(comment);
        },
        /**
         *
         * @param {Object} comment
         * Add a new Comment wich replies other comment.
         */
        addRepply(comment) {
            this.$root.selectedComment.replies.unshift(comment);
        }
    }
}
</script>
