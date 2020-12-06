<template>
  <v-container>
    <Header/>
    <div v-for="(detail,index) in List" :key="index">
        <div class="detailsPost-title">
          <h1>{{detail.title}}</h1>
        </div>
        <div class="detailsPost-description">
          <h5>{{detail.description}}</h5>
        </div>
        <div class="detailsPost-comment" v-for="(comment,index) in filterComment" :key="index">
          <Comments v-bind:comment="comment" v-bind:onePost="detail"/>
        </div>
          <AddComment v-bind:detail="detail"/>
        <div>
        </div>
    </div>
  </v-container>
</template>

<script>
import Header from "../components/Header"
import Comments from "../components/forumComponents/Comments"
import AddComment from "../components/forumComponents/AddComment"
import {mapGetters,mapActions} from "vuex"
export default {
    name:"DetailsPost",

    components:{
      Comments,
      AddComment,
      Header
    },
    methods:{
      ...mapActions(["allComments"]),
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
</style>