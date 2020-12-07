<template>
  <v-container>
      <div class="title-modalEditPost">
          <v-btn @click="closeEditModalPost" icon><v-icon>{{icons.mdiClose}}</v-icon></v-btn>
      </div>
      <div>
          <form @submit="submitEditPost">
            <v-text-field type="text" label="Title" v-model="title"></v-text-field>
            <v-text-field type="text" label="Description" v-model="description"></v-text-field>
            <div class="btnSubmit-newPost">
                 <v-btn type="submit" color="primary">Edit post</v-btn> 
            </div>
          </form>
      </div>
  </v-container>
</template>

<script>
import {mapActions,mapGetters} from "vuex"
import { mdiClose } from '@mdi/js';
export default {
    name:"EditPostModal",
    props:["singlePost"],
    data(){
        return{
            title:this.singlePost.title,
            description:this.singlePost.description,
            icons:{mdiClose}
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
                user_id:this.user.id
            }
            this.editPost(updatePost)
            this.title=""
            this.description=""
            this.closeEditModalPost()
        },

        closeEditModalPost(){
            this.$emit("close",false)
        }
    },
    computed:{
        ...mapGetters(["user"])
    }
}
</script>

<style scope>

.title-modalEditPost{
    display: flex;
    justify-content: flex-end;
}

</style>