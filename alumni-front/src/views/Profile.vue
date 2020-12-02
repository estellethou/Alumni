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
      </div> 
    </div>

    <div class="add">
      <input
        v-model="newProfileDescription"
        v-on:keyup.enter="addProfileOnSubmit(testUser())"
        class="form-control add-input"
        placeholder="Add description"
      />
    </div>

    <div class="delete">
      <button
        type="button"
        class="btn-delete"
        @click="deleteMyProfileOnSubmit(test2User())"
      >
        <!-- replace test2User by real user (props) -->
        Delete
      </button>
    </div>

    <!-- <div class="update">
      <input
        class="edit-description"
        type="text"
        v-model="newDescription"
        v-on:keyup.enter="onSubmit"
        :id="`${profile.id}`"
      />
    </div> -->
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "Profile",
  props: ["user"],
  data() {
    return {
      newProfileDescription: "",
      //newDescription: this.$store.getters.getOneProfile(this.user.id)
      //  .description,
      //newPhone: this.$store.getters.getOneProfile(this.user.id).phone,
      //newGithub: this.$store.getters.getOneProfile(this.user.id).url_github,
      //newLinkedin: this.$store.getters.getOneProfile(this.user.id).url_linkedin,
      //newSite: this.$store.getters.getOneProfile(this.user.id).url_website,
      //newImage: this.$store.getters.getOneProfile(this.user.id).image,
      //newResume: this.$store.getters.getOneProfile(this.user.id).resume,
    };
  },

  methods: {
    //...mapActions(["setAllProfiles", "addProfile", "deleteUser", "updateProfile"]),
    ...mapActions(["setAllProfiles", "addProfile", "deleteProfile"]),

    addProfileOnSubmit(user) {
      var newProfile = {
        user_id: user.id,
        description: this.newProfileDescription,
      };
      this.addProfile(newProfile);
      this.newProfileDescription = "";
    },

    deleteMyProfileOnSubmit() {
      this.deleteProfile(2);
    },

    // *** For testing, use deleteProfile but for production, use deleteUser and it will delete all data from DB :
    // *** Jobs, Comment, Post, Profile
    //deleteMyUserOnSubmit(user) {
    //  this.deleteUser(user.id);
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
