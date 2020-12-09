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
    <v-btn @click="closeModal">CLOSE</v-btn>
    <router-view></router-view>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "DeleteModal",

  data() {
    return {};
  },
  methods: {
    ...mapActions(["setAllProfiles", "deleteUser", "signOut"]),
    closeModal() {
      this.$emit("close", false);
    },
    deleteMyUserOnSubmit(user) {
      if (confirm("Are you sure you want to delete your profile ?")) {
        this.deleteUser(user.id);
        this.signOut();
      }
    },
  },
};
</script>

<style></style>
