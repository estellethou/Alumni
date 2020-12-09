<template>
<div>
  <Header/> 
  <div class="container">
    <h3 style="text-align: center">Want to reset your password ? you are at the correct place !</h3>
    <ul>
      <li>
        Enter your email address below to receive your token by mail.
      </li>
      <li>
        Once received copy/paste this token below in the token section.
      </li>
      <li>
        If token is valid then you will be able to change your password in the form that will appear.
      </li>
    </ul>
    <div class="alert alert-primary">
      <form v-on:submit.prevent="send_Token">
        <div class="form-group">
            <!-- <h3 style="text-align: center">Welcome to the reset password section</h3> -->
          <label>Email</label>
          <input
            type="text"
            class="form-control"
            v-bind:class="{ 'is-invalid': errorEmail, 'is-valid': infoEmail }"
            placeholder="Email..."
            v-model="email"
          />
          <div class="invalid-feedback">
            {{ errorEmail }}
          </div>
           <div class="valid-feedback">
            {{ infoEmail }}
          </div>
        </div>
        <button class="btn btn-primary">Send Token to Email Address</button>
      </form>
    </div>

    <div class="alert alert-secondary">
      <form v-on:submit.prevent="validate_Token">
        <div class="form-group">
          <label>Token</label>
          <input
            class="form-control"
            v-bind:class="{ 'is-invalid': errorToken, 'is-valid': infoToken }"
            placeholder="Token..."
            v-model="token"
          />
          <div class="invalid-feedback">
              {{ errorToken }}
          </div>
          <div class="valid-feedback">
              {{ infoToken }}
          </div>
        </div>
        <button class="btn btn-success" type="submit">Validate Token</button>
      </form>
    </div>

    <div class="alert alert-success" v-if="tokenValid">
      <form v-on:submit.prevent="change_Password">
        <div class="form-group">
          <label>New Password</label>
          <input
            type="password"
            class="form-control"
            v-model="newPassword"
            v-bind:class="{ 'is-invalid': errorNewPassword }"
            placeholder="New Password..."
          />
          <div class="invalid-feedback">
              {{ errorNewPassword }}
          </div>
        </div>

        <div class="form-group">
         <label>Password Confirmation</label>
          <input
            type="password"
            class="form-control"
            v-model="passwordAgain"
            v-bind:class="{ 'is-invalid': errorPasswordAgain }"
            placeholder="Confirm Password..."
          />
          <div class="invalid-feedback">
              {{ errorPasswordAgain }}
          </div>
        </div>
        <button type="submit" class="btn btn-success">Change Password</button>
      </form>
    </div>
  </div>
</div>
</template>


<script>
import { mapActions } from "vuex";
import Header from "./../components/Header"

export default {
  name: "ResetPassword",
  components: {
    Header
  },
  data() {
    return {
      email: "",
      errorEmail: null,
      infoEmail: null,
      token: "",
      errorToken: null,
      infoToken: null,
      newPassword: "",
      errorNewPassword: null,
      passwordAgain: "",
      errorPasswordAgain: null,
      tokenValid: false,
      user: null,
    };
  },
  methods: {
      ...mapActions(["sendToken", "validateToken","changePassword"]),
    send_Token() {
        this.errorEmail = null;
        if (!this.email)
        {
            this.errorEmail = 'Email address is required';
        }
        if (!this.errorEmail)
        {
            const data = {
                email: this.email
            }

            this.sendToken(data).then(() =>{
                this.infoEmail = 'Email sent';
            }).catch(error =>{
                this.errorEmail = error.response.data.error;
            });
        }
    },
    validate_Token() {
        this.errorToken = null;

        if(!this.token)
        {   
            this.errorToken = 'Token is required';
        }

        if(!this.errorToken)
        {
            const data = {
                token: this.token
            }

            this.validateToken(data).then(response => {
                if (response.data.id)
                {
                    this.tokenValid = true;
                    this.infoToken = "Token is valid";
                    this.user = response.data;
                }
            }).catch(error => {
                this.errorToken = error.response.data.error;
            })

        }
    },
    change_Password(){
        this.errorNewPassword = null;
        this.errorPasswordAgain = null;

        if(!this.newPassword)
        {
            this.errorNewPassword = 'New Password is required';
        }

        if(!this.passwordAgain)
        {
            this.errorPasswordAgain = 'Password Confirmation is required';
        }

        if (this.newPassword !== this.passwordAgain)
        {
            this.errorPasswordAgain = "Sorry Password do not match";
        }

        if (!this.errorNewPassword && !this.errorPasswordAgain)
        {
            const data = {
                password: this.newPassword,
                user_id: this.user.id
            }

            this.changePassword(data).then(() => {
                 this.$swal({
              title: "Password Update",
              text: "Your password has been updated, please sign in",
              icon: "success",
              confirmButtonText: "Ok",
            });
                this.$router.push('/signin');
            })

        }

    },

  },
};
</script>

<style>
</style>