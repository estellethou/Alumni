<template>
  <div class="container-comment">
      <p>{{comment.comment}}</p>
      <button id="btnRemove" @click="removeComment(comment.id)">Delete comment</button>
  </div>
</template>

<script>
import {mapActions} from "vuex"
export default {
    name:"Comment",
    props:["comment"],

    data(){
        return{
        }
    },

    methods:{
        ...mapActions(["deleteComment"]),
        removeComment(id){
            this.deleteComment(id)
        }
    }
}
</script>

<style scope>
#btnRemove{
    color:red
}
</style>