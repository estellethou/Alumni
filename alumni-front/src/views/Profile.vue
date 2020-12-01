<template>
  <div class="profile">
    <h1>Profile Vue</h1>
    <div v-for="profile in getAllProfiles" :key="profile.id">
      <h1>{{profile.description}}</h1>
    </div>
  </div>
</template>

<script>
import { mapGetters,mapActions } from "vuex"
export default {
  name: 'Profile',

  methods:{
    ...mapActions(["setAllProfiles", "addProfile", "deleteProfile", "updateProfile"]),
  },

  computed:{
    ...mapGetters(["getAllProfiles", "getOneProfile"])
  },

  created(){
    this.setAllProfiles();
    this.addProfile();
    this.deleteProfile();
    this.updateProfile();
  }
}
</script>
