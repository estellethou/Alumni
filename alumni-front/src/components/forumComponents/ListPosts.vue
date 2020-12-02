<template>
    <div class="container-posts">
        <div v-for="(post,index) in getAllPosts" :key="index">
            <Posts v-bind:post="post"/>
        </div>
    </div>
</template>

<script>
import Posts from "./Posts"
import {mapGetters,mapActions} from "vuex"
export default {
    name:"ListPosts",

    components:{
        Posts
    },

    methods:{
        ...mapActions(["allPosts"])
    },
    computed:{
        ...mapGetters(["getAllPosts"])
    },

    created(){
        this.allPosts()
    }
}
</script>

<style>

</style>