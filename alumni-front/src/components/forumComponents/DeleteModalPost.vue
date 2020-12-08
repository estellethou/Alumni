<template>
  <div>
      <div class="cornerModalDeletePost">
          <v-btn icon @click="closeModalDeletePost"><v-icon>{{icons.mdiClose}}</v-icon></v-btn>
      </div>
      <div class="centerWarningMessage">
          <p>Are you sur you want to delete this post ?</p>
            <div class="container-btnDeletePost">
              <v-btn @click="removePost(id)" color="error">DELETE POST</v-btn>
            </div>
      </div>
  </div>
</template>

<script>
import {mapActions} from "vuex"
import {mdiClose } from '@mdi/js';
export default {
    name:"DeleteModalPost",
    props:{
        id:Number
    },

    data(){
        return{
            icons:{mdiClose}
        }
    },

    methods:{
        ...mapActions(["deletePost"]),
        
        removePost(id){
            this.deletePost(id)
            this.$emit("closeDelete",false)
        },

        closeModalDeletePost(){
            this.$emit("closeDelete",false)
        }
    }
}


</script>

<style>

.cornerModalDeletePost{
    display: flex;
    justify-content: flex-end;
}
.container-btnDeletePost{
    display: flex;
    justify-content: center;
}

.centerWarningMessage{
    display: flex;
    flex-direction: column;
    align-items: center;
}

</style>