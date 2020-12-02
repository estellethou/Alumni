<template>
  <div class="container-posts">
      <div>
          <div class="container-titlePost">
              <router-link v-bind:to="`/post/${post.id}`"><h3>{{post.title}}</h3></router-link>
              <button @click="removePost(post.id)">delete post</button>  
          </div>
          <div class="container-descriptionPost">
              <p>{{post.description}}</p>
          </div>
      </div>
      <div>
          <ListComments v-bind:post="post"/> 
      </div>
  </div>
</template>

<script>
import ListComments from "../forumComponents/ListComments"
import {mapActions} from "vuex"
export default {
    name:"Posts",

    props:["post"],

    components:{
          ListComments,
    },

    methods:{
        ...mapActions(["deletePost"]),
        removePost(id){
            this.deletePost(id)
        }
    }
}
</script>

<style>

</style>