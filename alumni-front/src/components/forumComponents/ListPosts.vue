<template>
    <div class="container-posts">
        <div v-for="(post,index) in paginatedData" :key="index">
            <Posts class="postsCard" v-bind:post="post"/>
        </div>
        <div class="containerPaginationPost">
            <v-btn class="mr-2" @click="previousPage" :disabled="pageNumber==0" color="primary">prev</v-btn>
            <v-btn class="ml-2" @click="nextPage" :disabled="pageNumber >= pageCount -1" color="primary">next</v-btn>
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
            window.scrollTo(0,0);
            return this.pageNumber --
        },
        nextPage(){
            window.scrollTo(0,0);
            return this.pageNumber ++
        },

      
    },

    computed:{
        paginatedData(){
        const start = this.pageNumber * this.size,
        end = start +this.size
        return this.Posts.slice(start,end)
      },
      
      pageCount(){
            let l = this.Posts.length,
            s = this.size
            return Math.ceil(l/s)
      },
    },

    components:{
        Posts
    },
}
</script>

<style>
.container-posts{
    margin-left: 35px;
    margin-right: 35px;
}
.postsCard{
    margin-bottom:30px
}
.containerPaginationPost{
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
</style>