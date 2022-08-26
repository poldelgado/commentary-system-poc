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
                <button class="btn btn-primary ml-5" type="submit">Comment</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    props: {
        parent_id: {
            type: Number,
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
    methods: {
        submit() {
            const url=baseURL+'/api/comment';
            let formData = new FormData();
            formData.append('username',this.formInputs.username);
            formData.append('comment',this.formInputs.comment);
            axios.post(url, formData)
                .then(response => {
                    console.log(response);
                    this.cleanFields();
                    this.addComment();
                })
            console.log("submit form");
        },
        cleanFields()
        {
            this.formInputs.username = null;
            this.formInputs.comment = null;
        },
        addComment() {
            console.log('will shift new comment');
        }
    }
}
</script>
