<template>
<div>
<Header></Header>
<v-container>
  <v-card>
    <v-card-title>
      Directory
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table class="row-pointer" :headers="headers" :search="search" :items="getAllUserProfiles" @click:row="goToProfile">
    <template v-slot:[`item.image`]="{item}">
      <div v-if="item.image !== null">
   <img :src="'https://coding-alumni-bucket.s3.eu-west-3.amazonaws.com/images/' + item.image" width="50" height="50">
   </div>
   <div v-else>
     <v-icon dark>mdi-account-circle</v-icon>
   </div>
    </template>
    </v-data-table>
  </v-card>
</v-container>
</div>
</template>


<script>
import { mapGetters, mapActions } from "vuex";
import Header from "./../components/Header";

export default {
  name: "Directory",
  data(){
    return{
      // profimage:'https://coding-alumni-bucket.s3.eu-west-3.amazonaws.com/images/' + 'image',
      search:'',
      headers:[
        {
          value:'image',
          sortable:false,
        },
        {
            text: 'Firstname',
            align: 'start',
            sortable: true,
            value: 'firstname',
        },
        {text: 'Lastname', value:'lastname'},
        { text: 'Email', value: 'email' },
        { text: 'Phone', value: 'phone' },
        { text: 'Role', value: 'role' },
      ]
    }
  },
  methods: {
    ...mapActions(["setAllUserProfiles"]),
    goToProfile(value) {
      if(this.user.id !== value.user_id){
        this.$router.push(`/profile/${value.id}/${value.user_id}`)
      }else{
        this.$router.push('/profile')
      }

      
    },
  },
  components: {
    Header,
  },

  computed: {
    ...mapGetters(["getAllUserProfiles", "authenticated", "user"]),
  },

  created() {
    this.setAllUserProfiles();
  },
};
</script>

<style scoped>
.row-pointer >>> tbody tr :hover {
  cursor: pointer;
}
</style>