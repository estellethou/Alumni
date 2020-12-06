<template>
<div>
   <Header/> 
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr blue>
            <th class="text-left">Name</th>
            <th class="text-left">Email</th>
            <th class="text-left">Phone</th>
            <th class="text-left">Description</th>
            <th class="text-left">Role</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="userprofile in getAllUserProfiles"  :key="userprofile.id" @click="goToProfile(userprofile.id, userprofile.user_id)">
            <td>{{ userprofile.firstname }} {{ userprofile.lastname }}</td>
            <td>{{ userprofile.email }}</td>
            <td>{{ userprofile.phone }}</td>
            <td>{{ userprofile.description }}</td>
            <td>{{ userprofile.role }}</td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>


<script>
import { mapGetters, mapActions } from "vuex";
import Header from "./../components/Header"

export default {
  name: "Directory",
  methods: {
    ...mapActions(["setAllUserProfiles"]),
    goToProfile(profileid, userid){
      this.$router.push(`/profile/${profileid}/${userid}`)
    }
  },
  components:{
   Header,
  },

  computed: {
    ...mapGetters(["getAllUserProfiles", "authenticated"]),
  },

  created() {
    this.setAllUserProfiles();
  },
};
</script>

<style scoped>

</style>