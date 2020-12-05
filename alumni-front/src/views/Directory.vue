<template>
<div>
    <v-simple-table dark>
      <template v-slot:default>
        <thead>
          <tr >
            <th class="text-left">Name</th>
            <th class="text-left">Email</th>
            <th class="text-left">Phone</th>
            <th class="text-left">Description</th>
            <th class="text-left">Role</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="userprofile in getAllUserProfiles"  :key="userprofile.id">
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

export default {
  name: "Directory",
  methods: {
    ...mapActions(["setAllUserProfiles"]),
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