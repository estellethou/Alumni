<template>
  <v-container>
    <v-card>
      <v-container class="justify-space-between">
        <div class="sideByside" v-if="getImageOfUser[0].image !== ''">
          <div class="userProfile-displayComment" @click="redirectToProfile(getImageOfUser[0])">
            <v-avatar class="mr-7" size="50"><img v-bind:src="'https://coding-alumni-bucket.s3.eu-west-3.amazonaws.com/images/'+ getImageOfUser[0].image" alt="Avatar"/></v-avatar>
             <p>{{getNameUser[0].firstname +" "+ getNameUser[0].lastname}}</p>
          </div>
              <p>{{ timeAgo(Date.parse(comment.created_at)) }}</p>
        </div>
        <div class="sideByside" v-else>
          <div class="userProfile-displayComment">
            <v-avatar color="primary" class="mr-7" size="45"><v-icon dark>mdi-account-circle</v-icon></v-avatar>
             <p>{{getNameUser[0].firstname +" "+ getNameUser[0].lastname}}</p>
          </div>
          <p>{{ timeAgo(Date.parse(comment.created_at)) }}</p>
        </div>
      </v-container>
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
        ...mapActions(["deleteComment","editComment","setAllProfiles","setAllUsers"]),

        updateComment(){
          event.preventDefault()

          let updateComment ={
            id:this.comment.id,
            comment:this.com,
            user_id:this.comment.user_id,
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
        
        redirectToProfile(profile){
            if(this.user.id == profile.user_id){
                this.$router.push("/profile")
            }else{
                this.$router.push(`/profile/${profile.id}/${profile.user_id}`)
            }
        }
        
    },

    directives: {
    ClickOutside,
  },

  computed:{
    ...mapGetters(["user","getAllProfiles","getAllUsers"]),

    getImageOfUser(){
       console.log(this.comment,"comment")
      return this.getAllProfiles.filter(profile =>{
        return profile.user_id === this.comment.user_id
      })
    },
    
    getNameUser(){
            return this.getAllUsers.filter(user =>{
                return user.id == this.comment.user_id
            })
        }
  },

  created(){
    this.setAllProfiles()
    this.setAllUsers()
  }

}
</script>

<style scoped>

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
  align-items: center;
}
.sideByside p{
  font-weight: none;
  font-size: none;
}
.userProfile-displayComment{
    display: flex;
    cursor: pointer;
    align-items: center;
}
p{
  margin-bottom: 0px;
}

</style>