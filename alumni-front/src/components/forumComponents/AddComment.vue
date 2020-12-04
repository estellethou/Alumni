<template>
    <div class="container-addComment">
        <form @submit="submitComment">
            <label>New comment</label>
            <input type="text" name="comment" id="comment" v-model="newComment">
            <button>Add new comment</button>
        </form>
    </div>
</template>

<script>
import {mapActions} from "vuex"
export default {
    props:["detail"],
    name:"AddComment",
    
    data(){
        return{
            newComment:""
        }
    },

    methods:{
        ...mapActions(["addComment"]),
        submitComment(){
            event.preventDefault()
            let newComment ={
                comment:this.newComment,
                posts_id:this.detail.id,
                 //CHANGE THE USER_ID BY THE USER_ID OF THE PERSONNE CONNECTED
                user_id:2
                
            }
            console.log(newComment)
            this.addComment(newComment)
            this.newComment=""
      }
    }
}
</script>

<style>

</style>