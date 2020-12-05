<template>
  <div class="container-forum">
      <h1>Hello from Forum</h1>
      <input :keyup="searchInput" type="text" v-model="search" name="search" id="search">
      <div class="container-btnModal">
          <v-btn @click="toggleModalPost">Add a post</v-btn>
          <div v-if="isOpen" class="container-AddPostModal">
                 <AddPostModal v-on:close="updateParent(false)"/>
          </div>
      </div>
      <ListPosts v-bind:Posts="searchInput"/>   
  </div>
</template>

<script>
import AddPostModal from "../components/forumComponents/AddPostModal"
import ListPosts from "../components/forumComponents/ListPosts"
import {mapGetters,mapActions} from "vuex"
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
        AddPostModal
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
</style>