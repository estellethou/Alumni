<template>
  <v-container class="container-forum">
  <div class="container-forum">
      <Header/>
      <div class="container-titleForumPage">
           <h1>Forum Coding Academy - Alumni</h1> 
      </div>
      <v-text-field :keyup="searchInput" outlined type="text" v-model="search" label="Search"></v-text-field>
      <div class="container-btnModal">
          <div class="container-btnAddNewPost">
              <v-btn color="primary" @click="toggleModalPost">Add a new post</v-btn>  
          </div>
          <div v-if="isOpen" class="container-AddPostModal">
                 <AddPostModal v-on:close="updateParent(false)"/>
          </div>
      </div>
      <ListPosts v-bind:Posts="searchInput"/>
    </div> 
  </v-container>
</template>

<script>
import AddPostModal from "../components/forumComponents/AddPostModal"
import ListPosts from "../components/forumComponents/ListPosts"
import {mapGetters,mapActions} from "vuex"
import Header from "./../components/Header"
export default {
    name:"Forum",

    data(){
        return{
            search:"",
            isOpen:false
        }
    },

    components:{
        ListPosts,
        AddPostModal,
        Header
    },

    computed:{
        ...mapGetters(["getAllPosts"]),

        searchInput(){
            return this.getAllPosts.filter(post =>{
                let lowerCase = post.title.toLowerCase()+post.description.toLowerCase()
                let search = this.search.toLowerCase()
                return lowerCase.match(search)
            })
        }
    },

    methods:{
        ...mapActions(["allPosts"]),

        updateParent(bol){
            this.isOpen = bol
        },
        toggleModalPost(){
            this.isOpen = true
        }
    },

    created(){
        this.allPosts()
    }

}
</script>

<style scope >
.container-AddPostModal{
    position:fixed;
    background-color:beige;
    height: 300px;
    width: 400px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;

}
.container-btnModal{
    margin-bottom: 25px;
}
.container-titleForumPage{
    display: flex;
    justify-content: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.container-btnAddNewPost{
    display: flex;
    justify-content: center;
}
</style>