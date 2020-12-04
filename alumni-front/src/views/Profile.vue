<template>
  <div class="profile">
    <h1>Profile Vue</h1>
    <div v-for="profile in filteredProfile" :key="profile.id">
      <p>My user id {{ profile.user_id }}</p>
      <p> My description {{ profile.description }}</p>
      <p>My phone {{ profile.phone }}</p>
      <p> Myr url linkedIn{{ profile.url_linkedin }}</p>
      <p>My url gitHub{{ profile.url_github }}</p>
      <p>My personal website{{ profile.url_website }}</p>

      <img
        width="25"
        height="25"
        :src="
          'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/' +
          profile.image
        "
        alt="test"
      />
      <p>My resume{{ profile.resume }}</p>
      <DeleteProfile v-bind:user="user" /> 
      <EditProfile v-bind:profile="profile" v-bind:user="user"/> 
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import DeleteProfile from "@/components/ProfileComponents/DeleteProfile";
import EditProfile from "@/components/ProfileComponents/EditProfile";
export default {
  name: "Profile",
  components: {
    DeleteProfile,
    EditProfile,
  },
  data() {
    return {};
  },

  methods: {
    ...mapActions(["setAllProfiles"]),
  },

  computed: {
    ...mapGetters(["getAllProfiles", "authenticated", "user"]),
    filteredProfile() {
      return this.getAllProfiles.filter((profile) => {
        if (profile.user_id == this.user.id) return profile;
      });
    },
  },

  created() {
    this.setAllProfiles();
  },
};
</script>
