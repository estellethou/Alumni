<template>
  <div class="delete">
    <div class="d-flex flex-column align-items-center">
    <h3>Look how sad we are !</h3>
    <iframe src="https://giphy.com/embed/PW24kUmUv3vlm" width="480" height="270" frameBorder="0" class="giphy-embed"></iframe>
    </div>
    <div class="d-flex justify-content-around" style="margin-top:60px">
    <router-link :to="`/`">
      <button
        type="button"
        class="btn btn-danger btn-delete"
        @click="deleteMyUserOnSubmit(user)"
      >
        Delete My Profile
      </button>
    </router-link>
    <v-btn @click="closeModal">CLOSE</v-btn>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
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
        this.deleteUser(user.id);
        this.signOut();
    },
  },
    computed: {
    ...mapGetters(["authenticated", "user"]),
  },
};
</script>

<style>
.btn-delete {
  color:white;
}
</style>
