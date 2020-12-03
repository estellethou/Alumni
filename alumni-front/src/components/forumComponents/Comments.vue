<template>
  <div class="container-comment">
      <span>{{ timeAgo(Date.parse(comment.created_at)) }}</span>
      <p>{{comment.comment}}</p>
      <button id="btnRemove" @click="removeComment(comment.id)">Delete comment</button>
  </div>
</template>

<script>
import {mapActions} from "vuex"
export default {
    name:"Comment",
    props:["comment"],

    data(){
        return{
        }
    },

    methods:{
        ...mapActions(["deleteComment"]),
        removeComment(id){
            this.deleteComment(id)
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
      else return Math.floor(seconds) + " seconds ago";
    },
        
    }
}
</script>

<style scope>
#btnRemove{
    color:red
}
</style>