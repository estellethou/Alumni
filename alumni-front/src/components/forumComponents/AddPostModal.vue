<template>
    <v-container>
        <div class="title-modalAddPost">
            <v-btn @click="closeModal" icon><v-icon color="black">{{icons.mdiClose}}</v-icon></v-btn>
        </div>
        <div>
            <form @submit="submitPost">
                <div>
                    <v-text-field label="Title" v-model="title" ></v-text-field>
                    <v-text-field  label="Description"  v-model="description" ></v-text-field>
                </div>
                <div class="btnSubmit-newPost">
                    <v-btn type="submit" color="primary">Add a post</v-btn>
                </div>
            </form>
        </div>
    </v-container>
</template>

<script>
import {mapActions,mapGetters} from  "vuex"
import { mdiClose } from '@mdi/js';
export default {

    data(){
        return{
            title:"",
            description:"",
            icons:{mdiClose}
        }
    },
    methods:{
        ...mapActions(["addPost"]),
        submitPost(){
            event.preventDefault()
            const newPost ={
                title:this.title,
                description:this.description,
                user_id:this.user.id
            }
            this.addPost(newPost)
            this.title=""
            this.description=""
            this.closeModal()
        },

        closeModal(){
            this.$emit("close",false)
        }
    },

    computed:{
        ...mapGetters(["user"])

    },

}
</script>

<style scope>
.title-modalAddPost{
    display: flex;
    justify-content: flex-end;
}
.btnSubmit-newPost{
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
</style>