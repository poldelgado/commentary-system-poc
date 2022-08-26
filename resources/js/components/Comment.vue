<template>
    <div class="commented-section mt-2">
        <div class="d-flex flex-row align-items-center commented-user">
            <h5 class="mr-2">{{comment.username}}</h5><span class="dot mb-1"></span>
        </div>
        <div class="comment-text-sm"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>
        <div
            class="reply-section">
            <div class="d-flex flex-row align-items-center">
                <button class="btn btn-sm btn btn-outline-primary ml-3 mt-1">Reply</button>
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
            console.log("reply a comment");
        }
    },
}
</script>
