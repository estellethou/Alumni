<template>
  <div class="home">
    <div class="header">
      <!----- MENU BUTTON (Left) ----->
      <div class="dropdown menu1">
        <v-icon
          alt="menu"
          data-toggle="dropdown"
          large
          aria-haspopup="true"
          aria-expanded="false"
          class="hamburger"
          color="white"
        >{{ 'mdi-menu' }}</v-icon>
        <template v-if="authenticated">
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
        </template>
        <div class="title">CODING ACADEMY - ALUMNI</div>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <router-link :to="`/`" class="dropdown-item">Home</router-link>
          <router-link :to="`/recruter`" class="dropdown-item">Buisiness Section</router-link>
          <template v-if="authenticated">
            <router-link :to="`/directory`" class="dropdown-item">Directory</router-link>
            <router-link :to="`/profile`" class="dropdown-item">Profile</router-link>
            <router-link :to="`/job`" class="dropdown-item">Job / Internship</router-link>
            <router-link :to="`/forum`" class="dropdown-item">Forum</router-link>
            <router-link :to="`/event`" class="dropdown-item">Event</router-link>
          </template>
          <template v-else>
            <router-link :to="{name: 'Login'}" class="dropdown-item">Login / Register</router-link>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "Header",
  computed: {
    ...mapGetters(["authenticated"]),
  },

  methods: {
    ...mapActions(["signOut"]),

    signOutButton() {
      if (this.$route.path !== "/") {
          this.$router.push("/");
        }
      this.signOut().then(() => {
        this.$swal({
          title: "You have successfully logged out",
          text: "See you soon",
          icon: "success",
          confirmButtonText: "Ok",
        });
      });
    },
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap");
.background-home {
  background-image: url("https://coding-academy-alumni.herokuapp.com/icons/home.jpg");
  background-size: 100% 300px;
  height: 300px;
}

.title {
  font-family: "Nunito", sans-serif;
  color: white;
  margin-top: 1%;
  text-align: center;
  font-size: 30rem;
}

.header {
  height: 250px;
  background-image: url("https://coding-academy-alumni.herokuapp.com/icons/home.jpg");
}

.hamburger {
  margin: 2%;
}

.logout {
  margin: 2%;
  float: right;
}
</style>