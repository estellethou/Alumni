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
          <input type="url" class="form-control" id="url-git" />
        </div>
        <div class="form-group col-md-4">
          <label for="url-linkedin">URL LinkedIn</label>
          <input
            type="url"
            class="form-control"
            id="url-linkedin"
          />
        </div>
          <div class="form-group col-md-4">
          <label for="url-perso">URL personal website</label>
          <input
            type="url"
            class="form-control"
            id="url-perso"
          />
        </div>
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
      newResume: this.profile.resume,
    };
  },

  methods: {
    ...mapActions(["updateProfile"]),

    saveForm(e) {
      e.preventDefault();
          var newUser = {
              "id" : 2,
              //"id": user.id,
              "lastname": this.newLastName,
              "fisrtname": this.newFirstName,
              "email": this.newFirstName,
              "password": this.newPassword,
          }
          var newProfile = {
              "id" : 2,
              //"id": profile.id,
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
