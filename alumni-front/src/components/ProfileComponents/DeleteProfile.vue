<template>
    <div class="delete">
      <button
        type="button"
        class="btn btn-warning btn-delete"
        @click="deleteMyUserOnSubmit(user)"
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
    ...mapActions(["setAllProfiles", "deleteUser"]),

    deleteMyUserOnSubmit(user) {
      this.deleteUser(user.id);
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
