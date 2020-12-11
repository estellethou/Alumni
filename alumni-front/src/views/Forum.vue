<template>
    <div>
        <Header/>
        <v-container class="container-forum">
            <div class="container-forum">
      <div class="container-titleForumPage">
           <h1>Forum Coding Academy - Alumni</h1> 
      </div>
      <v-text-field :keyup="searchInput" class="mr-5 ml-5" outlined type="text" v-model="search" label="Search"></v-text-field>
      <div class="container-btnModal">
          <div class="container-btnAddNewPost">
              <v-btn color="primary" @click="toggleModalPost">Add a new post</v-btn>  
          </div>
          <div v-if="isOpen" class="container-AddPostModal">
                 <AddPostModal v-on:firstPage="getFirstPage(0)" v-on:close="updateParent(false)"/>
          </div>
          <div class="overlay" v-if="isOpen"></div>
      </div>
      <ListPosts v-bind:Posts="searchInput"/>
    </div> 
  </v-container>
    </div>

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
            isOpen:false,
        }
    },

    components:{
        ListPosts,
        AddPostModal,
        Header,
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
        },
        hideModalPost(){
            this.isOpen = false
        },
    },
    created(){
        this.allPosts()
    }

}
</script>

<style scope >
.container-AddPostModal{
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
.overlay{
    z-index: 1000;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: black;
    opacity: 0.4;
}
</style>