<template>
  <div>
      <div>
          <h1>Hello from EditModalPost</h1>
          <button @click="closeEditModalPost">close</button>
      </div>
      <div>
          <form @submit="submitEditPost">
            <label>Title</label>
            <input type="text" v-model="title">
            <label>Description</label>
            <input type="text" v-model="description">
            <button>Submit</button>
          </form>
      </div>
  </div>
</template>

<script>
import {mapActions} from "vuex"
export default {
    name:"EditPostModal",
    props:["singlePost"],
    data(){
        return{
            title:this.singlePost.title,
            description:this.singlePost.description
        }
    },

    methods:{
        ...mapActions(["editPost"]),
        submitEditPost(){
            event.preventDefault()

            let updatePost= {
                id:this.singlePost.id,
                title:this.title,
                description:this.description,
                user_id:2
            }
            this.editPost(updatePost)
            this.title=""
            this.description=""
            this.closeEditModalPost()
        },

        closeEditModalPost(){
            this.$emit("close",false)
        }
    }
}
</script>

<style>

</style>