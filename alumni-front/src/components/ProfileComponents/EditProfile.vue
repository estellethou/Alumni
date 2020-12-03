<template>
  <div class="edit">
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="lastname">{{newLastName}}</label>
          <input
            type="text"
            class="form-control"
            v-model="newLastName"
            id="lastname"
            placeholder="Lastname"
          />
        </div>
        <div class="form-group col-md-6">
          <label for="firstname">Firstname</label>
          <input
            type="text"
            class="form-control"
             v-model="newFirstName"
            id="firstname"
            placeholder="Firstname"
          />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="email">Email</label>
          <input
            type="email"
            class="form-control"
            v-model="newEmail"
            id="email"
            placeholder="Email"
          />
        </div>
        <div class="form-group col-md-6">
          <label for="phone">Phone</label>
          <input
            type="tel"
            class="form-control"
            v-model="newPhone"
            id="phone"
            placeholder="phone"
          />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="password">Password</label>
          <input
            type="password"
            class="form-control"
            v-model="newPassword"
            id="password"
            placeholder="Password"
          />
        </div>
        <div class="form-group col-md-6">
          <label for="confirmepass">Confirm password</label>
          <input
            type="password"
            class="form-control"
            v-model="confirmPassword"
            id="confirmepass"
            placeholder="Confirm Password"
          />
        </div>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input
          type="text"
          class="form-control"
          v-model="newDescription"
          id="description"
          placeholder="Talk about you and your activity"
        />
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="image">Profile image</label>
          <input type="file" class="form-control" id="image" />
        </div>
        <div class="form-group col-md-6">
          <label for="resume">Resume</label>
          <input
            type="file"
            class="form-control"
            id="resume"
            placeholder="Download your resume (.pdf)"
          />
        </div>
      </div>
    </form>
    <button type="submit" v-on:click="saveForm">Save Profile</button>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "EditProfile",
  props: ["user"],
  data() {
    return {
    //user module
        newLastName:"",
        //newLastName: this.user.lastname, METHOD YOANN
        newFirstName: "",
        newEmail: "",
        newPassword: "",
        confirmPassword: "",
        //newLastName: this.$store.getters.getOneUser(this.user.id).lastname,
        //newFirstName: this.$store.getters.getOneUser(this.user.id).firstname,
        //newEmail: this.$store.getters.getOneUser(this.user.id).email,
        //newPassword: this.$store.getters.getOneUser(this.user.id).password,
    //profile module
        newDescription: "",
        newPhone: "",
        newGithub: "",
        newLinkedin: "",
        newSite: "",
        newImage: "",
        newResume: "",
        //newDescription: this.$store.getters.getOneProfile(this.user.id)
        //  .description,
        //newPhone: this.$store.getters.getOneProfile(this.user.id).phone,
        //newGithub: this.$store.getters.getOneProfile(this.user.id).url_github,
        //newLinkedin: this.$store.getters.getOneProfile(this.user.id).url_linkedin,
        //newSite: this.$store.getters.getOneProfile(this.user.id).url_website,
        //newImage: this.$store.getters.getOneProfile(this.user.id).image,
        //newResume: this.$store.getters.getOneProfile(this.user.id).resume,
    };
  },

  methods: {
    ...mapActions(["updateProfile"]),

    saveForm(e) {
        e.preventDefault();
        var newUser = {
            "id" : 2,
            //"id": this.$store.getters.getOneProfile(user.id).id, 
            "lastname": this.newLastName,
            "fisrtname": this.newFirstName,
            "email": this.newFirstName,
            "password": this.newPassword,
        }
        var newProfile = {
            "id" : 2,
            //"id": user.id,
            "description": this.newDescription,
            "phone": this.newPhone,
            "url_github": this.newGithub,
            "url_linkedin": this.newLinkedin,
            "url_website": this.newSite,
            "image": this.newImage,
            "resume": this.newResume
        };
        this.updateProfile(newProfile);
        this.updateUser(newUser);
    },
    testUser() {
      var $user = { id: 2 };
      return $user;
    },
    test2User() {
      var $user = { id: 22 };
      return $user;
    },
  },

  computed: {
    ...mapGetters(["getAllProfiles", "getOneProfile", "getOneUser"]),
  },
};
</script>
