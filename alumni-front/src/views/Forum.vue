<template>
  <div class="container-forum">
      <h1>Hello from Forum</h1>
      <input :keyup="searchInput" type="text" v-model="search" name="search" id="search">
      <ListPosts v-bind:Posts="searchInput"/>
  </div>
</template>

<script>
import ListPosts from "../components/forumComponents/ListPosts"
import {mapGetters,mapActions} from "vuex"
export default {
    name:"Forum",

    data(){
        return{
            search:""
        }
    },

    components:{
        ListPosts
    },

    computed:{
        ...mapGetters(["getAllPosts"]),

        searchInput(){
            return this.getAllPosts.filter(post =>{
                let lowerCase = post.title.toLowerCase()
                let search = this.search.toLowerCase()
                return lowerCase.match(search)
            })
        }
    },

    methods:{
        ...mapActions(["allPosts"])
    },

    created(){
        this.allPosts()
    }

}
</script>

<style>

</style>