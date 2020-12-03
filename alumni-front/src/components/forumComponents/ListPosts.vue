<template>
    <div class="container-posts">
        <div v-for="(post,index) in Posts" :key="index">
            <Posts v-bind:post="post"/>
        </div>
    </div>
</template>

<script>
import Posts from "./Posts"
export default {
    name:"ListPosts",
    props:["Posts"],

    components:{
        Posts
    },
}
</script>

<style>

</style>