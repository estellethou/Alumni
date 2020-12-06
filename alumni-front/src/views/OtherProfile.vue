<template>
  <div class="profile container">
    <HeaderProfile/>
    <div class="background">
      <img
        class="profile-img"
        width="150"
        height="150"
        :src="
          'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/' +
          getOneProfile.image
        "
        alt="profile-image"
      />
      <div class="side-img">
        <img
          class="logo"
          width="180"
          height="80"
          src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/logo.png"
          alt="logo"
        />

        <h2 class="username">
          {{ getOneUser.firstname }} {{ getOneUser.lastname }}
        </h2>
      </div>
    </div>
    <div class="description">
      <p>{{ getOneProfile.description }}</p>
    </div>
    <v-card class="mx-auto container">
         <div class="d-flex justify-content-between">
          <div class="col-4">
            <img
              width="10%"
              src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/telephone.png"
              alt="logo"
            />
        {{ getOneProfile.phone }}
      </div>
        <div class="col-4">
            <img
              width="10%"
              src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/email.png"
              alt="logo"
            />
        {{ getOneUser.email }}
          </div>
             <div class="col-4">
      <a :href="getOneProfile.url_linkedin" class="icon-url col-4"
        ><img
          src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/blo.png"
          width="8%"
          alt="logo-linkedin"
      /></a>
      <a :href="getOneProfile.url_github" class="icon-url col-4"
        ><img
          src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/git.jpg"
          width="8%"
          alt="logo-github"
      /></a>
      <a :href="getOneProfile.url_website" class="icon-url col-4"
        ><img
          src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/web.png"
          width="8%"
          alt="logo-web"
      /></a>

</div>
        </div>
    </v-card>
    <div class="resume">
      <embed
        :src="
          'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/' +
          getOneProfile.resume
        "
        type="application/pdf"
        width="58%"
        height="800"
      />
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import HeaderProfile from "@/components/ProfileComponents/HeaderProfile";
export default {
  props: ["profileId", "userId"],
  name: "OtherProfile",
  components: {HeaderProfile},
  data() {
    return {};
  },

  methods: {
    ...mapActions(["setProfile", "setUser"]),
  },

  computed: {
    ...mapGetters(["getOneProfile", "getOneUser"]),
  },

  created() {
    this.setProfile(this.profileId);
    this.setUser(this.userId);
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap");
.profile {
  margin: auto;
}
.background {
  background-image: url("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/background.jpg");
  background-size: 100% 300px;
  height: 240px;
}
.profile-img {
  border-radius: 50%;
  position: relative;
  top: 70%;
  left: 45%;
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
