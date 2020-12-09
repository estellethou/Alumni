<template>
  <div class="profile container">
    <HeaderProfile />
    <div v-for="profile in filteredProfile" :key="profile.id">
      <div class="background">
        <div class="side-img">
          <img
            class="logo"
            width="12%"
            height="50%"
            src="https://coding-academy-alumni.herokuapp.com/icons/logo.png"
            alt="logo"
          />
          <div v-for="myuser in filteredUser" :key="myuser.id">
          <h2 class="username">{{ myuser.firstname }} {{ myuser.lastname }}</h2>
          </div>
        </div>
        <div class="position-img" v-if="profile.image !== ''">
          <img
            class="profile-img"
            width="190rem"
            height="190rem"
            :src="
              'https://coding-alumni-bucket.s3.eu-west-3.amazonaws.com/images/' +
              profile.image
            "
            alt="profile-image"
          />
        </div>
        <div v-else class="position-img">
          <v-avatar size="150" class="profile-img" color="#2F329F">
            <span class="white--text headline">{{initial()}}</span>
          </v-avatar>
        </div>
      </div>
      <div class="description">
        <p>{{ profile.description }}</p>
      </div>
      <v-card class="mx-auto container">
        <div class="d-flex justify-content-between">
          <div class="col-4">
            <img
              width="10%"
              src="https://coding-academy-alumni.herokuapp.com/icons/telephone.png"
              alt="logo"
            />
            {{ profile.phone }}
          </div>
          <div class="col-4">
            <img
              width="10%"
              src="https://coding-academy-alumni.herokuapp.com/icons/email.png"
              alt="logo"
            />
            {{ user.email }}
          </div>

          <div class="col-4">
            <a :href="profile.url_linkedin" class="icon-url col-4"
              ><img
                src="https://coding-academy-alumni.herokuapp.com/icons/blo.png"
                width="7%"
                alt="logo-linkedin"
            /></a>
            <a :href="profile.url_github" class="icon-url col-4"
              ><img
                src="https://coding-academy-alumni.herokuapp.com/icons/git.jpg"
                width="8%"
                alt="logo-github"
            /></a>
            <a :href="profile.url_website" class="icon-url col-4"
              ><img
                src="https://coding-academy-alumni.herokuapp.com/icons/web.png"
                width="8%"
                alt="logo-web"
            /></a>
          </div>
        </div>
      </v-card>
      <div v-if="profile.resume !== ''" class="resume">
        <embed
          :src="
            'https://coding-alumni-bucket.s3.eu-west-3.amazonaws.com/resumes/' +
            profile.resume
          "
          type="application/pdf"
          width="58%"
          height="800"
        />
  
      </div>

      <div class="d-flex justify-content-between buttons-profile">
        <EditProfile v-bind:profile="profile" v-bind:user="user"> </EditProfile>
        <DeleteProfile v-bind:user="user" />
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import DeleteProfile from "@/components/ProfileComponents/DeleteProfile";
import EditProfile from "@/components/ProfileComponents/EditProfile";
import HeaderProfile from "@/components/ProfileComponents/HeaderProfile";
export default {
  name: "Profile",
  components: {
    DeleteProfile,
    EditProfile,
    HeaderProfile,
  },
  data() {
    return {};
  },

  methods: {
    ...mapActions(["setAllProfiles", "setAllUsers"]),
    initial(){
      var firstnameLetter = this.user.firstname.charAt(0);
      var lastnameLetter = this.user.lastname.charAt(0);
      var initales = firstnameLetter + lastnameLetter;
      return initales.toUpperCase();
    },
  },
  
  computed: {
    ...mapGetters(["getAllProfiles","getAllUsers", "authenticated", "user"]),
    filteredProfile() {
      return this.getAllProfiles.filter((profile) => {
        if (profile.user_id == this.user.id) return profile;
      });
    },
     filteredUser() {
      return this.getAllUsers.filter((myuser) => {
        if (myuser.id == this.user.id) return myuser;
      });
    },
  },

  created() {
    this.setAllProfiles();
    this.setAllUsers();
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap");
.profile {
  margin: auto;
}
.background {
  background-image: url("https://coding-academy-alumni.herokuapp.com/icons/background.jpg");
  background-size: 100% 300px;
  height: 240px;
}
.profile-img {
  border-radius: 50%;
  position: relative;
  left: 45%;
}
.position-img {
  position: relative;
  top: 3rem;
}

.resume {
  display: flex;
  justify-content: center;
}

.side-img {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
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
  margin-top: 7rem;
  font-size: x-large;
  font-family: "Nunito", sans-serif;
}

.logo {
  margin-left: 2%;
  margin-top: 1%;
}

.buttons-profile{
  margin-top:3%;
}
</style>
