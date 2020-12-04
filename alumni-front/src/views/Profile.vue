<template>
  <div class="profile">
    <h1>Profile Vue</h1>
    <div v-for="profile in getAllProfiles" :key="profile.id">
      <!-- <div v-if="user.id == profile.user_id"> -->
      <div v-if="5 == profile.user_id">
        <p>My id is {{ profile.id }}</p>
        <p>My description is {{ profile.description }}</p>
        <p>My Phone {{ profile.phone }}</p>
        <p>My LinkedIn {{ profile.url_linkedin }}</p>
        <p>My GitHub {{ profile.url_github }}</p>
        <p>My personal website {{ profile.url_website }}</p>
        <img
          :src="
            'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/' +
            profile.image
          "
          alt="test"
        />
        <p>My resume{{ profile.resume }}</p>
        <DeleteProfile v-bind:user="user" />
        <EditProfile v-bind:user="user" v-bind:profile="profile" />       
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
    return {};
  },

  methods: {
    ...mapActions(["setAllProfiles"]),

    testUser() {
      var $user = { id: 2 };
      return $user;
    },

    test2User() {
      var $user = { id: 22 };
      return $user;
    },
        resumeChanged(e) {
    var fileReader = new FileReader();
    fileReader.readAsDataURL(e.target.files[0]);
    fileReader.onload = (e) => {
      this.newResume = e.target.result; 
      console.log(e.target.result);
    };
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
