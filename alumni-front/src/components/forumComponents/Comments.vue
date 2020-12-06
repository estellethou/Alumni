<template>
  <v-container>
    <v-card>
      <v-card-title class="justify-space-between">

        <div class="sideByside" v-if="getImageOfUser[0].image !== ''">

          <v-avatar size="50"><img v-bind:src="'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/'+ getImageOfUser[0].image" alt="Avatar"/></v-avatar>
              <p>{{ timeAgo(Date.parse(comment.created_at)) }}</p>
        </div>
        <div class="sideByside" v-else>
          <v-avatar color="light-blue darken-4" size="50"><v-icon dark>mdi-account-circle</v-icon></v-avatar>
          <p>{{ timeAgo(Date.parse(comment.created_at)) }}</p>
        </div>
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
          <v-btn v-if="this.user.id == comment.user_id" @click="toggleCommentInput" icon><v-icon>{{icons.mdiPencil}}</v-icon></v-btn>
        </div>
      </v-card-text>
      <v-card-text>
        <v-btn v-if="this.user.id == comment.user_id" @click="removeComment(comment.id)" color="error" depressed>Delete comment</v-btn>
      </v-card-text>
    </v-card>
    </v-container>
</template>
<script>
import {mapActions,mapGetters} from "vuex"
import { mdiPencil,mdiClose} from '@mdi/js';
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
        ...mapActions(["deleteComment","editComment","setAllProfiles"]),

        updateComment(){
          event.preventDefault()

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
          console.log(this.getImageOfUser)
            this.deleteComment(id)
        },

        toggleCommentInput(){
          this.edit = !this.edit
        },
        closeToggleInput(){
          this.edit = false
        },

        getFirstLetter(){

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
    ...mapGetters(["user","getAllProfiles"]),

    getImageOfUser(){
      return this.getAllProfiles.filter(profile =>{
        return profile.user_id == this.comment.user_id
      })
    }
  },

  created(){
    this.setAllProfiles()
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
.sideByside{
  display: flex;
  justify-content: space-between;
  width: 100%;
}
.containerShowComment p{
  font-size:20px
}
</style>