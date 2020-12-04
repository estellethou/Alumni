<template>
    <div class="container-addPostModal">
        <h1>Hello from addModalPost</h1>
        <button @click="closeModal">Close modal</button>
        <div>
            <form @submit="submitPost">
                <label>Title</label>
                <input type="text" name="title" id="title" v-model="title" >
                <label>Description</label>
                <input type="text" name="description" id="description" v-model="description" >
                <button>Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
import {mapActions} from  "vuex"
export default {

    data(){
        return{
            title:"",
            description:"",
        }
    },
    methods:{
        ...mapActions(["addPost"]),
        submitPost(){
            event.preventDefault()
            const newPost ={
                title:this.title,
                description:this.description,
                //NEED TO CHANGE THE USER_ID FOR THE USER_ID OF THE LOG IN PERSONNE//
                user_id:2
            }
            this.addPost(newPost)
            this.title=""
            this.description=""
            this.closeModal()
        },

        closeModal(){
            this.$emit("close",false)
        }
    }
}
</script>

<style>

</style>