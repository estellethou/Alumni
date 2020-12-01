<template>
  <div class="profile">
    <h1>Profile Vue</h1>
    <div v-for="profile in getAllProfiles" :key="profile.id">
      <p>My id is {{profile.id}}</p>
      <p>{{profile.description}}</p>
      <p>{{profile.phone}}</p>
      <p>{{profile.url_linkedin}}</p>
      <p>{{profile.url_github}}</p>
       <p>{{profile.url_website}}</p>
       <p>{{profile.image}}</p>
       <p>{{profile.resume}}</p>
    </div>

    <div class="add">
        <input  v-model="newProfileDescription"
                v-on:keyup.enter="addProfileOnSubmit(testUser())"
                class="form-control add-input"
                placeholder="Add description"
        >
    </div>
  </div>
</template>

<script>
import { mapGetters,mapActions } from "vuex"
export default {
  name: 'Profile',

   data() {
    return {
      newProfileDescription: "",
    };
  },

  methods:{
    //...mapActions(["setAllProfiles", "addProfile", "deleteProfile", "updateProfile"]),
    ...mapActions(["setAllProfiles", "addProfile", "deleteProfile"]),

    addProfileOnSubmit(user){
        var newProfile = {
            "user_id" : user.id,
            "description" : this.newProfileDescription,
        };
        this.addProfile(newProfile);
        this.newProfileDescription = "";
    },

    deleteProfileOnSubmit(id){
        this.deleteProfile(id);
    },

    testUser(){
        var $user = { "id": 2 };
        return($user);
    }
  },

  computed:{
    ...mapGetters(["getAllProfiles", "getOneProfile"])
  },

  created(){
    this.setAllProfiles();
  }
}
</script>
