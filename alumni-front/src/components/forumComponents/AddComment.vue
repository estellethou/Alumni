<template>
    <v-container class="container-addComment">
        <v-card>
            <v-card-text>
                <v-form @submit="submitComment">
                    <v-text-field label="New comment" v-model="newComment"></v-text-field>
                    <div class="container-btnNewComment">
                        <v-btn color="primary" type="submit">Add new comment</v-btn>
                    </div>
        </v-form>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script>
import {mapActions} from "vuex"
export default {
    props:["detail"],
    name:"AddComment",
    
    data(){
        return{
            newComment:"",
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

<style scope>
.container-btnNewComment{
    display:flex;
    justify-content: flex-end;
}
</style>