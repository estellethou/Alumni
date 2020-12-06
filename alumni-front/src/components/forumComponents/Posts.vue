<template>
      <v-card>
          <div class="container-titlePost">
              <v-container class="d-flex justify-space-between">
                   <router-link v-bind:to="`/post/${post.id}`">

                    <div class="container-headerPost" v-if="getImageOfUser[0].image !== ''">

                        <v-avatar size="50"><img v-bind:src="'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/'+ getImageOfUser[0].image" alt="Avatar"/></v-avatar>
                        <p>{{ timeAgo(Date.parse(post.created_at)) }}</p>
                      </div>
                      <div class="container-headerPost" v-else>
                          <v-avatar color="primary" size="50"><v-icon dark>mdi-account-circle</v-icon></v-avatar>
                          <p>{{ timeAgo(Date.parse(post.created_at)) }}</p>
                    </div>
                    </router-link>
              </v-container>
              <v-container>
                  <div class="d-flex justify-center">
                      <h3>{{post.title}}</h3>
                  </div>
                  <div class="container-descriptionPost">
                      <p>{{post.description}}</p>
                  </div>
                  <div class="container-actionOnPost">
                    <v-btn v-if="this.user.id == post.user_id" @click="removePost(post.id)" color="error">delete post</v-btn> 
                    <v-btn v-if="this.user.id == post.user_id" @click="openEditModalPost" color="primary">Edit</v-btn>
                    <div class="container-modalEditPost" v-if="isOpen">
                    <EditPostModal v-bind:singlePost="post" v-on:close="updateParentProps(false)"/> 
                  </div>
              </div>
              </v-container>
          </div>
      </v-card>

</template>

<script>
import EditPostModal from "../forumComponents/EditPostModal"
import {mapActions,mapGetters} from "vuex"
export default {
    name:"Posts",
     props:["post"],
    data(){
        return{
            isOpen:false

        }
    },

    components:{
        EditPostModal
    },
    computed:{
        ...mapGetters(["getAllComments","user","getAllProfiles"]),
        
        getImageOfUser(){
            return this.getAllProfiles.filter(profile =>{
                return profile.user_id == this.post.user_id
      })
    }
    },
    methods:{
        ...mapActions(["deletePost","setAllProfiles"]),
        removePost(id){
            this.deletePost(id)
        },

        updateParentProps(){
            this.isOpen = false
        },

        openEditModalPost(){
            this.isOpen = true
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
      created(){
    this.setAllProfiles()
  }
}

</script>

<style scope>
.container-modalEditPost{
    position:fixed;
    background-color:beige;
    height: 300px;
    width: 400px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
}
a{
    text-decoration: none;
    width: 100%;
}
.container-headerPost{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.container-descriptionPost{
    display:flex;
    justify-content: center;
}
.container-actionOnPost{
    display:flex;
    justify-content: space-between;
}
</style>