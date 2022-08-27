<template>
    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
        <ul>
            <li v-for="error in errors" :key="error" class="error">
                {{error}}
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    props: {
        errors: {
            type: Array,
            required: true,
        }
    },
}
</script>
<style scoped>
    .error {
        color: red;
    }
</style>
