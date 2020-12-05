<template>
  <div>
      <div>
          <h1>Hello from EditModalPost</h1>
          <button @click="closeEditModalPost">close</button>
      </div>
      <div>
          <form @submit="submitEditPost">
            <v-text-field type="text" label="Title" v-model="title"></v-text-field>
            <v-text-field type="text" label="Description" v-model="description"></v-text-field>
            <v-btn type="submit">Submit</v-btn>
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