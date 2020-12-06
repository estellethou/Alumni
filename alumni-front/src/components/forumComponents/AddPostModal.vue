<template>
    <div class="container-addPostModal">
        <h1>Hello from addModalPost</h1>
        <button @click="closeModal">Close modal</button>
        <div>
            <form @submit="submitPost">
                <v-text-field label="Title" v-model="title" ></v-text-field>
                <v-text-field  label="Description"  v-model="description" ></v-text-field>
                <v-btn type="submit">Submit</v-btn>
            </form>
        </div>
    </div>
</template>

<script>
import {mapActions,mapGetters} from  "vuex"
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
    }
}
</script>

<style>

</style>