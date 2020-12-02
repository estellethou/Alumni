<template>
  <div class="container-posts">
      <div>
          <div class="container-titlePost">
              <h3>{{post.title}}</h3>  
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
export default {
    name:"Posts",

    props:["post"],

    components:{
          ListComments,
    }
}
</script>

<style>

</style>