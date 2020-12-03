<template>
  <v-form @submit.prevent="submit"> 
    <v-container>
      <v-row>
        <v-col
          cols="12"
          sm="6"
        >
          <v-text-field
            v-model="form.email"
            label="Email"
            outlined
            type="email"
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
          sm="6"
        >
          <v-text-field
            v-model="form.password"
            
            label="Password"
            outlined
            type="password"
            hint="At least 6 characters"
            counter
          ></v-text-field>
          <v-btn depressed type="submit">
            Sign in
        </v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    name: 'SignIn',
    components:{

    },

    data(){
        return {
            form:{
                email:'',
                password:''
            }
            
        }
    },

    methods:{
        ...mapActions(["signIn"]),
        submit(){
            this.signIn(this.form).then(()=> {
                this.$router.replace({
                    name: 'Dashboard'
                })
            }).catch(() =>{
                console.log('failed') // here send a user message for failed authentication
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