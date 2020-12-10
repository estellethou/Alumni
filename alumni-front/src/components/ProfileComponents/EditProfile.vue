<template>
  <div data-app class="edit">
    <v-row justify="center">
      <v-dialog v-model="dialog" persistent max-width="600px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn depressed class="btn-modal" v-bind="attrs" v-on="on">
            Edit profile
          </v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">My Profile</span>
          </v-card-title>
          <v-form class="container">
            <div class="form-row">
              <div class="form-group col-md-6">
                <v-text-field
                  ref="loginForm"
                  placeholder="Lastname"
                  v-model="newLastName"
                  id="lastname"
                  :rules="firstnameRule"
                  label="Last Name"
                  maxlength="20"
                  required
                ></v-text-field>
              </div>
              <div class="form-group col-md-6">
                <v-text-field
                  ref="loginForm"
                  placeholder="Firstname"
                  v-model="newFirstName"
                  id="firstname"
                  :rules="firstnameRule"
                  label="First Name"
                  maxlength="20"
                  required
                ></v-text-field>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <v-text-field
                  id="email"
                  v-model="newEmail"
                  :rules="emailRules"
                  label="E-mail"
                  required
                  :placeholder="Email"
                ></v-text-field>
              </div>
              <div class="form-group col-md-6">
                <v-text-field
                  id="phone"
                  :rules="phoneRule"
                  v-model="newPhone"
                  :counter="10"
                  label="Phone"
                  :placeholder="newPhone"
                ></v-text-field>
              </div>
            </div>
            <div class="form-groupe">
              <v-text-field
                v-model="newPassword"
                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                :rules="[rules.minchar]"
                :type="show1 ? 'text' : 'password'"
                name="input-10-1"
                label="Password"
                hint="At least 6 characters"
                counter
                @click:append="show1 = !show1"
              ></v-text-field>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea
                type="text"
                class="form-control"
                v-model="newDescription"
                id="description"
                placeholder="Talk about you and your activity"
              ></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="url-git">URL GitHub</label>
                <input type="url" class="form-control" v-model="newGithub" id="url-git" />
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
                <input type="url" class="form-control" v-model="newSite" id="url-perso" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="image">Select your profile image</label>
                <input
                  type="file"
                  class="form-control"
                  id="image"
                  accept="image/png, image/jpeg"
                  @change="imageChanged"
                />
                <p style="display: none" id="error-img">Image too big, please choose another one </p>
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
          </v-form>
          <v-spacer></v-spacer>
          <div class="d-flex justify-content-between">
          <v-btn color="blue darken-1" class="btn-close" text @click="dialog = false"> Close </v-btn>
          <v-btn :disabled="!valid" class="btn-save" @click="saveForm"> Save </v-btn>
          </div>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "EditProfile",
  props: ["profile", "user"],
  data() {
    return {
      dialog: false,
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

      rules: {
        required: (value) => !!value || "Required.",
        minchar: (v) => (v && v.length >= 6) || "Min 6 characters",
        min: (v) => (v && v.length >= 2) || "Min 2 characters",
        digits: 10,
      },
      firstnameRule: [(v) => (v && v.length >= 2) || "Firstname must be valid"],
      emailRules: [(v) => /.+@.+\..+/.test(v) || "E-mail must be valid"],
      phoneRule: [
        (v) =>
          (!isNaN(parseFloat(v)) && v >= 0 && v <= 9999999999) ||
          "Phone number must be valid",
      ],
      valid: true,
      show1: false,
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
        } else if (this.Email == this.newEmail) {
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
        } else if (this.Email == this.newEmail) {
          newUser = {
            id: this.user.id,
            lastname: this.newLastName,
            firstname: this.newFirstName,
            password: this.newPassword,
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

      if (this.$refs.loginForm.validate()) {
        this.updateProfile(newProfile);
        this.updateUser(newUser)
          .then(() => {
            this.$swal({
              title: "Profile updated",
              icon: "success",
              confirmButtonText: "Ok",
            });
          })
          .catch(() => {
            this.$swal({
              title: "Profile Error!",
              text: "Wrong password or email already taken",
              icon: "error",
              confirmButtonText: "Retry",
            });
          });
      }
      document.getElementById("error-img").style.display = "none";
    },

    imageChanged(e) {
      var imgpath=document.getElementById('image');
      if ( !imgpath.value=="" && imgpath.files[0].size<2000000){
        document.getElementById("error-img").style.display = "none";
        var fileReader = new FileReader();
        fileReader.readAsDataURL(e.target.files[0]);
        fileReader.onload = (e) => {
          this.newImage = e.target.result;
        }
      }
      else {
        document.getElementById("error-img").style.display = "block";
      }
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

<style scoped>
.btn-modal {
  color: white !important;
  background-color: rgb(0, 118, 253) !important;
}

#error-img {
  color: rgb(168, 0, 0);
  font-size: small;
  text-align: center;
}

.v-btn--contained{
  box-shadow: 0px, 0px, 0px, 0px!important;
  background-color: rgb(210, 231, 210) !important;
}
.btn-save{
  margin-right: 20px;
  margin-bottom: 20px;
  color: rgb(24, 163, 24)
}

.btn-close{
  margin-left: 20px;
  margin-bottom: 20px;
  box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
  background-color: #d5def8;
}

</style>
