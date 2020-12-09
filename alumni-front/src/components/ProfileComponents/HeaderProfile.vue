<template>
  <div class="home">
    <div>
      <!----- MENU BUTTON (Left) ----->
      <div class="dropdown menu1">
        <img
          src="https://coding-academy-alumni.herokuapp.com/icons/menu.png"
          alt="menu"
          width="2%"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          class="hamburger"
        />
        <!----- EXIT BUTTON (Right) ----->
        <a href="#" @click.prevent="signOutButton">
          <img
            src="https://coding-academy-alumni.herokuapp.com/icons/log-out.png"
            alt="logout"
            width="40px"
            height="40px"
            class="logout"
          />
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <router-link :to="`/`" class="dropdown-item"> Home </router-link>
          <router-link :to="`/recruter`" class="dropdown-item">
            Buisiness Section
          </router-link>
          <template v-if="authenticated">
            <router-link :to="`/directory`" class="dropdown-item">
              Directory
            </router-link>
            <router-link :to="`/profile`" class="dropdown-item">
              Profile
            </router-link>
            <router-link :to="`/job`" class="dropdown-item">
              Job / Internship
            </router-link>
            <router-link :to="`/forum`" class="dropdown-item">
              Forum
            </router-link>
              <router-link :to="`/event`" class="dropdown-item">
              Event
            </router-link>
          </template>
          <template v-else>
              <router-link :to="{name: 'Login'}" class="dropdown-item">
                Login / Register
              </router-link>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "HeaderProfile",
  computed: {
    ...mapGetters(["authenticated", "user"]),
  },

  methods: {
    ...mapActions(["signOut"]),

    signOutButton() {
      this.signOut().then(() => {
        this.$router.replace({
          name: "Home",
        });
      });
    },
  },
};
</script>

<style>
.hamburger {
  margin: 2%;
}

.logout {
  margin: 2%;
  float: right;
}
</style>