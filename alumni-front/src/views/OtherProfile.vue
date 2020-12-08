<template>
  <div class="profile container">
    <HeaderProfile/>
    <div class="background">
      <div class="side-img">
        <img
          class="logo"
          width="12%"
          height="50%"
          src="https://coding-academy-alumni.herokuapp.com/icons/logo.png"
          alt="logo"
        />

        <h2 class="username">
          {{ getOneUser.firstname }} {{ getOneUser.lastname }}
        </h2>
      </div>
      <div class="position-img" v-if="getOneProfile.image !== ''">
      <img
        class="profile-img"
        width="190rem"
        height="190rem"
        :src="
          'https://coding-alumni-bucket.s3.eu-west-3.amazonaws.com/images/' +
          getOneProfile.image
        "
        alt="profile-image"
      />
      </div>
           <div v-else class="position-img">
          <v-avatar
            class="mr-7 profile-img"
            color="light-blue darken-4"
            size="100"
            ><v-icon dark>mdi-account-circle</v-icon></v-avatar
          >
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
              src="https://coding-academy-alumni.herokuapp.com/icons/telephone.png"
              alt="logo"
            />
        {{ getOneProfile.phone }}
      </div>
        <div class="col-4">
            <img
              width="10%"
              src="https://coding-academy-alumni.herokuapp.com/icons/email.png"
              alt="logo"
            />
        {{ getOneUser.email }}
          </div>
             <div class="col-4">
      <a :href="getOneProfile.url_linkedin" class="icon-url col-4"
        ><img
          src="https://coding-academy-alumni.herokuapp.com/icons/blo.png"
          width="8%"
          alt="logo-linkedin"
      /></a>
      <a :href="getOneProfile.url_github" class="icon-url col-4"
        ><img
          src="https://coding-academy-alumni.herokuapp.com/icons/git.jpg"
          width="8%"
          alt="logo-github"
      /></a>
      <a :href="getOneProfile.url_website" class="icon-url col-4"
        ><img
          src="https://coding-academy-alumni.herokuapp.com/icons/web.png"
          width="8%"
          alt="logo-web"
      /></a>

</div>
        </div>
    </v-card>
    <div class="resume">
      <embed
        :src="
          'https://coding-alumni-bucket.s3.eu-west-3.amazonaws.com/resumes/' +
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
</style>
