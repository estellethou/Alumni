<template>
  <div class="profile container">
    <div v-for="profile in filteredProfile" :key="profile.id">
      <div class="background">
        <img
          class="profile-img"
          width="150"
          height="150"
          :src="
            'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/' +
            profile.image
          "
          alt="profile-image"
        />
        <div class="side-img">
          <img
            class="logo"
            width="180"
            height="80"
            src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/logo.png"
            alt="logo"
          />

          <h2 class="username">{{ user.firstname }} {{ user.lastname }}</h2>
        </div>
      </div>
      <div class="description">
        <p>{{ profile.description }}</p>
      </div>
      <v-card class="mx-auto container">
        <p>
          <img
            width="2%"
            src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/phone.png"
            alt="logo"
          />
          {{ profile.phone }}
        </p>
        <a :href="profile.url_linkedin"
          ><img
            src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/linkedin.png"
            width="2%"
            alt="logo-linkedin"
        /></a>
        <a :href="profile.url_github"
          ><img
            src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/git.jpg"
            width="2%"
            alt="logo-github"
        /></a>
        <a :href="profile.url_website"
          ><img
            src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/web.png"
            width="2%"
            alt="logo-web"
        /></a>
      </v-card>
      <embed
        :src="
          'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/' +
          profile.resume
        "
        type="application/pdf"
        width="100%"
        height="800"
      />
<div class="d-flex justify-content-between">
 <DeleteProfile v-bind:user="user" />
      <EditProfile v-bind:profile="profile" v-bind:user="user"> </EditProfile> 
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

<style>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap");
.profile {
  margin: auto;
}
.background {
  background-image: url("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/background.jpg");
  background-size: 100% 300px;
  height: 240px;
}
.profile-img {
  border-radius: 50%;
  position: relative;
  top: 70%;
  left: 45%;
}

.side-img {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.logo {
  margin-left: 2%;
}
.username {
  color: white;
  margin-top: 1.5%;
  margin-right: 2%;
  font-family: "Nunito", sans-serif;
  font-weight: bold;
}

.description {
  position: relative;
  margin-top: 6rem;
  font-size: x-large;
  font-family: "Nunito", sans-serif;
}
</style>
