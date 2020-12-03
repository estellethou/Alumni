<template>
  <div class="container-comment">
      <span>{{ timeAgo(Date.parse(comment.created_at)) }}</span>
      <v-btn @click="toggleCommentInput">edit</v-btn>
      <div v-if="edit">
        <form @submit="updateComment">
          <v-text-field type="text" v-model="com"></v-text-field>
          <v-btn type="submit">submit</v-btn>
        </form>
      </div>
      <p v-else>{{comment.comment}}</p>
      <v-btn @click="removeComment(comment.id)">Delete comment</v-btn>
  </div>
</template>

<script>
import {mapActions} from "vuex"
export default {
    name:"Comment",
    props:["comment","onePost"],

    data(){
        return{
          com:this.comment.comment,
          edit:false
        }
    },

    methods:{
        ...mapActions(["deleteComment","editComment"]),

        updateComment(){
          event.preventDefault()
          console.log(this.onePost.id)

          let updateComment ={
            id:this.comment.id,
            comment:this.com,
            user_id:2,
            posts_id:this.onePost.id,
          }
          console.log(updateComment)

          this.editComment(updateComment)
        },

        removeComment(id){
            this.deleteComment(id)
        },

        toggleCommentInput(){
          this.edit = !this.edit
        },
      
      timeAgo: (date) => {
        var seconds = Math.floor((new Date() - date) / 1000);
        var interval = seconds / 31536000;

        if (interval > 1) {
          return Math.floor(interval) + " years ago";
        }
        interval = seconds / 2592000;
        if (interval > 1) {
          return Math.floor(interval) + " months ago";
        }
        interval = seconds / 86400;
        if (interval > 1) {
          return Math.floor(interval) + " days ago";
        }
        interval = seconds / 3600;
        if (interval > 1) {
          return Math.floor(interval) + " hours ago";
        }
        interval = seconds / 60;
        if (interval > 1) {
          return Math.floor(interval) + " minutes ago";
        }
        if (Math.floor(seconds) < 30) return "just now";
        else return "few seconds ago";
    },
        
    }
}
</script>

<style scope>
</style>