<template>
  <div class="container-details">
    <div v-for="(detail,index) in List" :key="index">
        <div class="detailsPost-title">
          <h1>{{detail.title}}</h1>
        </div>
        <div class="detailsPost-description">
          <h5>{{detail.description}}</h5>
        </div>
        <div class="detailsPost-comment" v-for="(comment,index) in Comment" :key="index">
          <p>{{comment.comment}}</p>
        </div>
    </div>
  </div>
</template>

<script>
import {mapGetters} from "vuex"
export default {
    name:"DetailsPost",


    computed:{
      ...mapGetters(["getAllPosts","getAllComments"]),

      List(){
        return this.getAllPosts.filter(post =>{
          return post.id == this.$route.params.id
        })
      },
      Comment(){
        return this.getAllComments.filter(comment =>{
          return comment.posts_id == this.List[0].id
        })
      },
    }
}
</script>

<style>

</style>