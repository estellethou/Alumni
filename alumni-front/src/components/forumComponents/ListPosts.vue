<template>
    <div class="container-posts">
        <div v-for="(post,index) in Posts" :key="index">
            <Posts class="postsCard" v-bind:post="post"/>
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
.container-posts{
    margin-left: 25px;
    margin-right: 25px;
}
.postsCard{
    margin-bottom:30px
}
</style>