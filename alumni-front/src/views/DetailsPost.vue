<template>
  <div>
    <Header/>
      <v-container>
    <div v-for="(detail,index) in List" :key="index">
        <div class="detailsPost-title">
          <h1>{{detail.title}}</h1>
        </div>
        <div class="detailsPost-description">
          <h5>{{detail.description}}</h5>
        </div>
        <div class="detailsPost-comment" v-for="(comment,index) in paginatedData" :key="index">
          <Comments v-bind:comment="comment" v-bind:onePost="detail"/>
        </div>
          <AddComment v-bind:detail="detail"/>
    </div>
    <div class="containerPaginationComment">
      <v-btn class="mr-2" @click="previousPage" :disabled="pageNumber==0" color="primary">prev</v-btn>
      <v-btn class="ml-2" @click="nextPage" :disabled="pageNumber >= pageCount -1" color="primary">next</v-btn>
    </div>
  </v-container>
  </div>
</template>

<script>
import Header from "../components/Header"
import Comments from "../components/forumComponents/Comments"
import AddComment from "../components/forumComponents/AddComment"
import {mapGetters,mapActions} from "vuex"
export default {
    name:"DetailsPost",
    
    data(){
        return{
            pageNumber:0,
            size:5

        }
    },

    components:{
      Comments,
      AddComment,
      Header
    },
    methods:{
      ...mapActions(["allComments"]),
      
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
      ...mapGetters(["getAllPosts","getAllComments"]),

      List(){
        return this.getAllPosts.filter(post =>{
          return post.id == this.$route.params.id
        })
      },
      filterComment(){
        return this.getAllComments.filter(comment =>{
          return comment.posts_id == this.List[0].id
        })
      },
      
      paginatedData(){
        const start = this.pageNumber * this.size,
        end = start +this.size
        return this.filterComment.slice(start,end)
      },
      
      pageCount(){
            let l = this.filterComment.length,
            s = this.size
            return Math.ceil(l/s)
      },

    },
    created(){
      this.allComments()
    }
}
</script>

<style>
.detailsPost-title{
  display: flex;
  justify-content: center;
}
.detailsPost-description{
    display: flex;
  justify-content: center;
}
.containerPaginationComment{
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
</style>