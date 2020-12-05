<template>
    <div class="delete">
      <router-link :to="`/`">
      <button
        type="button"
        class="btn btn-danger btn-delete"
        @click="deleteMyUserOnSubmit(user)"
      >
        Delete Profile
      </button>
      </router-link>
      <router-view></router-view>
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
    ...mapActions(["setAllProfiles", "deleteUser"]),

    deleteMyUserOnSubmit(user) {
      if (confirm("Are you sure you want to delete your profile ?")){
        this.deleteUser(user.id);
      }
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

<style>
.btn-delete {
  color: white !important;
}
</style>
