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
import {mapActions,mapGetters} from "vuex"
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
                user_id:this.user.id
                
            }
            console.log(newComment)
            this.addComment(newComment)
            this.newComment=""
      }
    },

    computed:{
        ...mapGetters(["user"])
    }
}
</script>

<style scope>
.container-btnNewComment{
    display:flex;
    justify-content: flex-end;
}
</style>