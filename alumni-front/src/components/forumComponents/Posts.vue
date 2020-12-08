<template>
      <v-card>
          <div class="container-titlePost">
              <v-container class="d-flex justify-space-between">
                    <div class="container-headerPost" v-if="getImageOfUser[0].image !== ''">
                        <div class="userProfile-display" @click="redirectToProfile(getImageOfUser[0])">
                            <v-avatar size="40" class="mr-7"><img v-bind:src="'https://coding-academy-alumni.herokuapp.com/'+ getImageOfUser[0].image" alt="Avatar"/></v-avatar>
                            <p>{{getNameUser[0].firstname +" "+ getNameUser[0].lastname}}</p>
                        </div>
                        <p class="timeColor">{{ timeAgo(Date.parse(post.created_at)) }}</p>
                        <div v-if="this.user.id == post.user_id" class="mdiClose">
                            <v-btn  @click="removePost(post.id)" icon><v-icon>{{icons.mdiClose}}</v-icon></v-btn>
                        </div>
                      </div>
                      <div class="container-headerPost" v-else>
                          <div class="userProfile-display" @click="redirectToProfile(getImageOfUser[0])">
                              <v-avatar color="primary" class="mr-7" size="40"><v-icon dark>mdi-account-circle</v-icon></v-avatar>
                              <p>{{getNameUser[0].firstname +" "+ getNameUser[0].lastname}}</p>
                          </div>
                          <p class="timeColor">{{ timeAgo(Date.parse(post.created_at)) }}</p>
                          <div v-if="this.user.id == post.user_id" class="mdiClose" >
                              <v-btn @click="openModalDeletePost" icon><v-icon>{{icons.mdiClose}}</v-icon></v-btn>
                          </div>
                          <div class="container-modalDeletePost" v-if="isDelete">
                              <DeleteModalPost v-bind:id="post.id" v-on:closeDelete="updateIsDelete(false)" />
                          </div>
                          <div class="overlay" v-if="isDelete"></div>
                    </div>
              </v-container>
              <v-container>
                  <div class="d-flex justify-center">
                      <h3>{{post.title}}</h3>
                  </div>
                  <div class="container-descriptionPost">
                      <p>{{post.description}}</p>
                  </div>
                  <div class="container-actionOnPost">
                    <router-link v-bind:to="`/post/${post.id}`"><v-btn icon><v-icon>{{icons.mdiCommentAccountOutline}}</v-icon><span>{{mapArrayNumberOfComment(getNumberOfComment)}}</span></v-btn></router-link>
                    <div class="editBtn" v-if="this.user.id == post.user_id" @click="openEditModalPost" color="primary">Edit</div>
                    <div class="container-modalEditPost" v-if="isOpen">
                    <EditPostModal v-bind:singlePost="post" v-on:close="updateParentProps(false)"/> 
                    </div>
                    <div class="overlay" v-if="isOpen"></div>
              </div>
              </v-container>
          </div>
      </v-card>

</template>

<script>
import EditPostModal from "../forumComponents/EditPostModal"
import DeleteModalPost from "../forumComponents/DeleteModalPost"
import { mdiCommentAccountOutline,mdiClose } from '@mdi/js';
import {mapActions,mapGetters} from "vuex"
export default {
    name:"Posts",
     props:["post"],
    data(){
        return{
            isOpen:false,
            icons:{mdiCommentAccountOutline,mdiClose},
            isDelete:false,

        }
    },

    components:{
        EditPostModal,
        DeleteModalPost
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
        },
        getNumberOfComment(){
            return this.getAllComments.filter(comment =>{
                return comment.posts_id == this.post.id
            })
        }
    },
    methods:{
        ...mapActions(["setAllProfiles","setAllUsers"]),

        mapArrayNumberOfComment(array){
            return array.length
        },
        openModalDeletePost(){
            this.isDelete = true
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
        },

        updateIsDelete(){
            this.isDelete = false
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
    background-color:white;
    height: 300px;
    width: 600px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1010;
    border-radius:15px
}
.container-modalDeletePost{
    position:fixed;
    background-color:white;
    height: 300px;
    width: 600px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1010;
    border-radius:15px 
}
a span{
    text-decoration: none;
}
.container-headerPost{
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    width: 100%;
}
.container-descriptionPost{
    display:flex;
    justify-content: center;
}
.container-actionOnPost{
    display:flex;
    justify-content: space-between;
    align-items: center;
}
.userProfile-display{
    display: flex;
    cursor: pointer;
    align-items: baseline;
}
.mdiClose{
    align-self: baseline;
}

.timeColor{
    color:#1E88E5
}

.editBtn{
    cursor: pointer;
    padding-right: 10px;
}
</style>