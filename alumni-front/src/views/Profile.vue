<template>
  <div class="profile">
    <h1>Profile Vue</h1>
    <div v-for="profile in getAllProfiles" :key="profile.id">
      <!-- <div v-if="user.id == profile.user_id"> -->
      <div v-if=" 2 == profile.user_id"> 
        <p>My id is {{ profile.id }}</p>
        <p>My description is {{ profile.description }}</p>
        <p>My Phone {{ profile.phone }}</p>
        <p>My LinkedIn {{ profile.url_linkedin }}</p>
        <p>My GitHub {{ profile.url_github }}</p>
        <p>My personal website {{ profile.url_website }}</p>
        <p>My image {{ profile.image }}</p>
        <p>My resume{{ profile.resume }}</p>
        <DeleteProfile v-bind:user="user"/>
        <EditProfile v-bind:user="user" v-bind:profile="profile"/>
      </div> 
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import DeleteProfile from "@/components/ProfileComponents/DeleteProfile";
import EditProfile from "@/components/ProfileComponents/EditProfile";
export default {
  name: "Profile",
  props: ["user"],
  components: {
    DeleteProfile,
    EditProfile,
  },
  data() {
    return {
    };
  },

  methods: {
    //...mapActions(["setAllProfiles", "addProfile", "deleteUser", "updateProfile"]),
    ...mapActions(["setAllProfiles"]),

    //addProfileOnSubmit(user) {
    //  var newProfile = {
    //    user_id: user.id,
    //    description: this.newProfileDescription,
    //  };
    //  this.addProfile(newProfile);
    //  this.newProfileDescription = "";
    //},

    testUser() {
      var $user = { id: 2 };
      return $user;
    },

    test2User() {
      var $user = { id: 22 };
      return $user;
    },
  },

  computed: {
    ...mapGetters(["getAllProfiles", "getOneProfile"]),
  },

  created() {
    this.setAllProfiles();
  },
};
</script>
