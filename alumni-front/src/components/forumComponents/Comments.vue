<template>
  <v-container>
    <v-card>
      <v-card-title class="justify-space-between">
              <v-avatar  color="primary" class="text--white" size="40"><v-icon dark>mdi-account-circle</v-icon></v-avatar>
              <p>{{ timeAgo(Date.parse(comment.created_at)) }}</p>
      </v-card-title>
      <v-card-text>
        <div  v-if="edit">
          <form class="formEditComment"  @submit="updateComment">
            <v-text-field class="inputComment" type="text" v-model="com"></v-text-field>
            <v-btn type="submit">submit</v-btn>
            <v-btn icon @click="closeToggleInput"><v-icon>{{icons.mdiClose}}</v-icon></v-btn>
          </form>
        </div>
        <div class="containerShowComment" v-else>
          <p>{{comment.comment}}</p>
          <v-btn @click="toggleCommentInput" icon><v-icon>{{icons.mdiPencil}}</v-icon></v-btn>
        </div>
      </v-card-text>
      <v-card-text>
        <v-btn @click="removeComment(comment.id)" color="red lighten-1">Delete comment</v-btn>
      </v-card-text>
    </v-card>
    </v-container>
</template>
<script>
import {mapActions,mapGetters} from "vuex"
import { mdiPencil,mdiClose } from '@mdi/js';
import ClickOutside from "vue-click-outside";
export default {
    name:"Comment",
    props:["comment","onePost"],


    data(){
        return{
          com:this.comment.comment,
          edit:false,
          icons: { mdiPencil,mdiClose},
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

          this.editComment(updateComment)
          this.edit = false
        },

        removeComment(id){
            this.deleteComment(id)
        },

        toggleCommentInput(){
          this.edit = !this.edit
        },
        closeToggleInput(){
          this.edit = false
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
        
    },

    directives: {
    ClickOutside,
  },

  computed:{
    ...mapGetters([""])
  }
}
</script>

<style scope>

.inputComment{
  width:70%
}
.formEditComment{
  display:flex;
  align-items: center;
}
.containerShowComment{
  display:flex;
  justify-content: space-between;
}
</style>