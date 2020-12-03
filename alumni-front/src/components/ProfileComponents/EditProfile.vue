<template>
  <div class="edit">
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="lastname">LastName</label>
          <input
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
        <div class="form-group col-md-4">
          <label for="url-git">URL GitHub</label>
          <input
            type="url"
            class="form-control"
            v-model="newGithub"
            id="url-git"
          />
        </div>
        <div class="form-group col-md-4">
          <label for="url-linkedin">URL LinkedIn</label>
          <input
            type="url"
            class="form-control"
            v-model="newLinkedin"
            id="url-linkedin"
          />
        </div>
        <div class="form-group col-md-4">
          <label for="url-perso">URL personal website</label>
          <input
            type="url"
            class="form-control"
            v-model="newSite"
            id="url-perso"
          />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input
            type="file"
            class="form-control"
            id="image"
            @change="imageChanged"
            ref="fileImage"
          />
          <!-- <button class="btn btn-outline-primary btn-sm" @click="$refs.fileImage.click()">Pick your profile image</button>
          <button class="btn btn-outline-secondary btn-sm" @click="onUploadImage">Upload Image</button> -->
        </div>
        <div class="form-group col-md-6">
          <input
            style="display: none"
            type="file"
            class="form-control"
            id="resume"
            ref="fileResume"
          />
          <!-- <button class="btn btn-outline-primary btn-sm" @click="$refs.fileResume.click()">Pick your resume</button>
          <button class="btn btn-outline-secondary btn-sm" @click="onUploadResume">Upload Resume</button> -->
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
  props: ["user", "profile"],
  data() {
    return {
      //profile user
      newLastName: "",
      newFirstName: "",
      newEmail: "",
      newPassword: "",
      confirmPassword: "",
      //newLastName: this.user.lastname,
      //newFirstName: this.user.lastname,
      //newEmail: this.user.lastname,
      //newPassword: this.user.lastname,
      //confirmPassword: "",

      //profile module
      newDescription: this.profile.description,
      newPhone: this.profile.phone,
      newGithub: this.profile.url_github,
      newLinkedin: this.profile.url_linkedin,
      newSite: this.profile.url_website,
      newImage: this.profile.image,
      //newResume: this.profile.resume,
    };
  },

  methods: {
    ...mapActions(["updateProfile"]),

    saveForm(e) {
      e.preventDefault();
      //var newUser = {
      //  id: 2,
      //  //"id": user.id,
      //  lastname: this.newLastName,
      //  fisrtname: this.newFirstName,
      //  email: this.newFirstName,
      //  password: this.newPassword,
      //};
      var newProfile = {
        id: this.profile.id,
        description: this.newDescription,
        phone: this.newPhone,
        url_github: this.newGithub,
        url_linkedin: this.newLinkedin,
        url_website: this.newSite,
        image: this.newImage,
      };
      this.updateProfile(newProfile);
      //this.updateUser(newUser);
    },
    imageChanged(e) {
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);
      fileReader.onload = (e) => {
        this.newImage = e.target.result; 
      };
    },
  },
  computed: {
    ...mapGetters(["getAllProfiles", "getOneProfile", "getOneUser"]),
  },
};
</script>

