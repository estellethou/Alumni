<template>
  <div class="Job">
    <h1>Hello from Job</h1>
      <ListJobsAdd />
      <ListJobs />
  </div>
</template>

<script>
import ListJobs from "@/components/JobComponents/ListJobs.vue"
import ListJobsAdd from "@/components/JobComponents/ListJobsAdd.vue"


export default {
  name: 'Job',

  components: {
    ListJobsAdd,
    ListJobs,
  },

}
</script>
