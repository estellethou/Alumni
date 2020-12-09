<template>
    <div class="container-posts">
        <div v-for="(post,index) in paginatedData" :key="index">
            <Posts class="postsCard" v-bind:post="post"/>
        </div>
        <div class="containerPagination">
            <v-btn class="mr-2" @click="previousPage" :disabled="pageNumber==0" color="primary">prev</v-btn>
            <v-btn class="ml-2" @click="nextPage" :disabled="pageNumber >= pagecount -1" color="primary">next</v-btn>
        </div>
    </div>
</template>

<script>
import Posts from "./Posts"
export default {
    name:"ListPosts",
    props:["Posts"],
    
    data(){
        return{
            pageNumber:0,
            size:5

        }
    },

    methods:{
        
        previousPage(){
            return this.pageNumber --
        },
        nextPage(){
            return this.pageNumber ++
        },

        pageCount(){
            let l = this.List.length,
            s = this.size
            return Math.ceil(l/s)
      }
    },

    computed:{
        paginatedData(){
        const start = this.pageNumber * this.size,
        end = start +this.size
        return this.Posts.slice(start,end)
      },
    },

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
.containerPagination{
    display: flex;
    justify-content: center;
}
</style>