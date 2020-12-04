<template>
  <div class="container-posts">
      <div>
          <div class="container-titlePost">
              <router-link v-bind:to="`/post/${post.id}`"><h3>{{post.title}}</h3><span>{{ timeAgo(Date.parse(post.created_at)) }}</span></router-link>
              <button @click="openEditModalPost">Edit</button>
              <div class="container-modalEditPost" v-if="isOpen">
                  <EditPostModal v-bind:singlePost="post" v-on:close="updateParentProps(false)"/>
              </div>
              <button @click="removePost(post.id)">delete post</button>  
          </div>
          <div class="container-descriptionPost">
              <p>{{post.description}}</p>
          </div>
          <div>
              <p>comment number<span></span></p>
              <button @click="countComment">duxbchbds</button> 
          </div>
      </div>
  </div>
</template>

<script>
import EditPostModal from "../forumComponents/EditPostModal"
import {mapActions,mapGetters} from "vuex"
export default {
    name:"Posts",
     props:["post"],
    data(){
        return{
            isOpen:false

        }
    },

    components:{
        EditPostModal
    },
    computed:{
        ...mapGetters(["getAllComments"]),
    },
    methods:{
        ...mapActions(["deletePost"]),
        removePost(id){
            this.deletePost(id)
        },

        updateParentProps(){
            this.isOpen = false
        },

        openEditModalPost(){
            this.isOpen = true
        },
        timeAgo: (date) => {
        var seconds = Math.floor((new Date() - date) / 1000);
        var interval = seconds / 31536000;

        if (interval > 1) {
            return Math.floor(interval) + " years ago";
        }
        interval = seconds / 2592000;
        if (interval > 1) {
            return Math.floor(interval) + " months ago";
        }
        interval = seconds / 86400;
        if (interval > 1) {
            return Math.floor(interval) + " days ago";
        }
        interval = seconds / 3600;
        if (interval > 1) {
            return Math.floor(interval) + " hours ago";
        }
        interval = seconds / 60;
        if (interval > 1) {
            return Math.floor(interval) + " minutes ago";
        }
        if (Math.floor(seconds) < 30) return "just now";
        else return "few seconds ago";
        },
        
        countComment(){
        let count = 0
        this.getAllComments.filter(comment=>{
                if(comment.posts_id == this.post.id){
                    count++
                    console.log(count) 
                }
            })
        }
    },
}

</script>

<style scope>
.container-modalEditPost{
    position:fixed;
    background-color:beige;
    height: 300px;
    width: 400px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>