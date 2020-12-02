<template>
  <div class="home">
    <h1>Hello from Homememe</h1>
    <div v-for="comment in getAllComments" :key="comment.id">
      <h1>{{comment.comment}}</h1>
    </div>
  </div>
</template>

<script>
import { mapGetters,mapActions } from "vuex"
export default {
  name: 'Home',

  methods:{
    ...mapActions(["allComments"]),
  },

  computed:{
    ...mapGetters(["getAllComments"])
  },
  created(){
    this.allComments()
  }


}
</script>
