<template>
    <div class="delete">
      <button
        type="button"
        class="btn-delete"
        @click="deleteMyProfileOnSubmit(user)"
      >
        <!-- replace test2User by real user (props) -->
        Delete
      </button>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "DeleteProfile",
  props: ["user"],
  data() {
    return {
    };
  },
  methods: {
    ...mapActions(["setAllProfiles", "deleteProfile", "deleteUser"]),
    
    deleteMyProfileOnSubmit(user){
      this.deleteProfile(user.id);
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
