<template>
      <v-card>
          <div class="container-titlePost">
              <v-container class="d-flex justify-space-between">
                    <div class="container-headerPost" v-if="getImageOfUser[0].image !== ''">
                        <div class="userProfile-display" @click="redirectToProfile(getImageOfUser[0])">
                            <v-avatar size="50" class="mr-7"><img v-bind:src="'https://coding-academy-alumni.herokuapp.com/'+ getImageOfUser[0].image" alt="Avatar"/></v-avatar>
                            <p>{{getNameUser[0].firstname +" "+ getNameUser[0].lastname}}</p>
                        </div>
                        <p>{{ timeAgo(Date.parse(post.created_at)) }}</p>
                      </div>
                      <div class="container-headerPost" v-else>
                          <div>
                              <v-avatar color="primary" class="mr-7" size="50"><v-icon dark>mdi-account-circle</v-icon></v-avatar>
                              <p>{{getNameUser[0].firstname +" "+ getNameUser[0].lastname}}</p>
                          </div>
                          <p>{{ timeAgo(Date.parse(post.created_at)) }}</p>
                    </div>
              </v-container>
              <v-container>
                  <router-link v-bind:to="`/post/${post.id}`">
                  <div class="d-flex justify-center">
                      <h3>{{post.title}}</h3>
                  </div>
                  <div class="container-descriptionPost">
                      <p>{{post.description}}</p>
                  </div>
                  </router-link>
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
        ...mapGetters(["getAllComments","user","getAllProfiles","getAllUsers","user"]),
        
        getImageOfUser(){
            return this.getAllProfiles.filter(profile =>{
                return profile.user_id == this.post.user_id
            })
        },

        getNameUser(){
            return this.getAllUsers.filter(user =>{
                return user.id == this.post.user_id
            })
        }
    },
    methods:{
        ...mapActions(["deletePost","setAllProfiles","setAllUsers"]),
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
        redirectToProfile(profile){
            if(this.user.id == profile.user_id){
                this.$router.push("/profile")
            }else{
                this.$router.push(`/profile/${profile.id}/${profile.user_id}`)
            }
        }
        
    },
      created(){
    this.setAllProfiles()
    this.setAllUsers()
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
}
.container-headerPost{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}
.container-descriptionPost{
    display:flex;
    justify-content: center;
}
.container-actionOnPost{
    display:flex;
    justify-content: space-between;
}
.userProfile-display{
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>