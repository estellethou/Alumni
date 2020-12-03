<template>
    <div class="container-addComment">
        <v-form @submit="submitComment">
            <v-text-field label="New comment" :rules="rules" hide-details="auto" v-model="newComment"></v-text-field>
            <v-btn class="mt-20" type="submit">Add new comment</v-btn>
        </v-form>
    </div>
</template>

<script>
import {mapActions} from "vuex"
export default {
    props:["detail"],
    name:"AddComment",
    
    data(){
        return{
            newComment:"",
            rules: [
                value => !!value || 'Required.',
                value => (value && value.length >= 5) || 'Min 5 characters',
            ],
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