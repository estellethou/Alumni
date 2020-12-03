<template>
  <v-form @submit.prevent="submit"> 
    <v-container>
      <v-row>
        <v-col
          cols="12"
          sm="6"
        >
          <v-text-field
            v-model="form.firstname"
            label="Firstname"
            outlined
            type="text"
          ></v-text-field>
        
          <v-text-field
            v-model="form.lastname"
            label="Lastname"
            outlined
            type="text"
          ></v-text-field>
          
            <v-text-field
            v-model="form.email"
            label="Email"
            outlined
            type="email"
          ></v-text-field>

            <v-text-field
            v-model="form.password"
            label="Password"
            outlined
            type="new-password"
            hint="At least 6 characters"
            counter
          ></v-text-field>

            <v-text-field
            v-model="form.password_confirmation"
            label="Confirm Password"
            outlined
            type="new-password"
            hint="At least 6 characters"
            counter
          ></v-text-field>

        <v-btn depressed type="submit">
            Sign up
        </v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    name: 'Register',
    components:{

    },

    data(){
        return {
            form:{
                firstname:'',
                lastname:'',
                email:'',
                password:'',
                password_confirmation:''
            },
        }
    },

    methods:{
        ...mapActions(["register", "signIn"]),
        submit(){
            this.register(this.form).then(() => {
                this.signIn({email: this.form.email,password:this.form.password})
                this.$router.replace({
                    name: 'Home'
                })
            }).catch(() => {
                console.log('register failed')
            })
        },
        
    },
    computed:{
        ...mapGetters(["authenticated", "user"]),
},
}

</script>

<style>

</style>