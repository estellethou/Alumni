<template>
  <div class="container-comments">
        <div v-for="comment in filterComment" :key="comment.id">
          <Comment v-bind:comment="comment"/>
        </div>
  </div>
</template>

<script>
import Comment from "../forumComponents/Comment"
import { mapGetters,mapActions } from "vuex"
export default {
    name:"ListComments",

    props:["post"],
    components:{
      Comment
    },

    methods:{
    ...mapActions(["allComments"]),
    },
    
    computed:{
    ...mapGetters(["getAllComments"]),

      filterComment(){
        return this.getAllComments.filter(comment =>{
          return  comment.posts_id == this.post.id
        })
      }
    },
    
    created(){
    this.allComments()
    }

}
</script>

<style>

</style>