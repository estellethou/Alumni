<template>
  <div class="container-forum">
      <h1>Hello from Forum</h1>
      <ListPosts/>
  </div>
</template>

<script>
import ListPosts from "../components/forumComponents/ListPosts"
export default {
    name:"Forum",

    components:{
        ListPosts
    }
}
</script>

<style>

</style>