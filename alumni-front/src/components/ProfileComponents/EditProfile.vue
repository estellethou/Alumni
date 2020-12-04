<template>
  <div class="edit">
    <form enctype="multipart/form-data">
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
            :placeholder="Email"
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
      <div class="form-groupe">
        <label for="password">Password</label>
        <input
          type="password"
          class="form-control"
          v-model="newPassword"
          id="password"
          placeholder="Password"
        />
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
          <label for="image">Select your profile image</label>
          <input
            type="file"
            class="form-control"
            id="image"
            @change="imageChanged"
          />
        </div>
        <div class="form-group col-md-6">
          <label for="image">Select your resume</label>
          <input
            type="file"
            class="form-control"
            id="resume"
            accept="application/pdf"
            @change="resumeChanged"
          />
        </div>
      </div>
    </form>
    <button class="btn btn-primary" type="submit" v-on:click="saveForm">
      Save Profile
    </button>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "EditProfile",
  props: ["profile", "user"],
  data() {
    return {
      //profile user
      newLastName: this.user.lastname,
      newFirstName: this.user.firstname,
      Email: this.user.email,
      newEmail: "",
      newPassword: "",

      //profile module
      newDescription: this.profile.description,
      newPhone: this.profile.phone,
      newGithub: this.profile.url_github,
      newLinkedin: this.profile.url_linkedin,
      newSite: this.profile.url_website,
      newImage: "",
      newResume: "",
    };
  },

  methods: {
    ...mapActions(["updateProfile", "updateUser"]),

    saveForm(e) {
      e.preventDefault();
      if (this.newPassword !== "") {
        if (this.Email !== this.newEmail && this.newEmail !== "") {
          var newUser = {
            id: this.user.id,
            lastname: this.newLastName,
            firstname: this.newFirstName,
            email: this.newEmail,
            password: this.newPassword,
          };
        } else if (this.newEmail == "") {
          newUser = {
            id: this.user.id,
            lastname: this.newLastName,
            firstname: this.newFirstName,
            password: this.newPassword,
          };
        }
      } else if (this.newPassword == "") {
        if (this.Email !== this.newEmail && this.newEmail !== "") {
          newUser = {
            id: this.user.id,
            lastname: this.newLastName,
            firstname: this.newFirstName,
            email: this.newEmail,
          };
        } else if (this.newEmail == "") {
          newUser = {
            id: this.user.id,
            lastname: this.newLastName,
            firstname: this.newFirstName,
          };
        }
      }

      var newProfile = {
        id: this.profile.id,
        description: this.newDescription,
        phone: this.newPhone,
        url_github: this.newGithub,
        url_linkedin: this.newLinkedin,
        url_website: this.newSite,
        image: this.newImage,
        resume: this.newResume,
      };
      this.updateProfile(newProfile);
      this.updateUser(newUser);
    },
    imageChanged(e) {
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);
      fileReader.onload = (e) => {
        this.newImage = e.target.result;
      };
    },
    resumeChanged(e) {
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);
      fileReader.onload = (e) => {
        this.newResume = e.target.result;
      };
    },
  },
  computed: {
    ...mapGetters(["getOneProfile", "authenticated"]),
  },
};
</script>

