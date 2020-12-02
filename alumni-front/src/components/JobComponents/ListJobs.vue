<template>
    <div>
        <div v-for="job in getAllJobs" :key="job.id">
            <p> {{ job.title }}</p>
            <button @click="destroyJob(job.id)">Delete Job/Internship</button>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
    name: 'ListJobs',
    
    computed: {
        ...mapGetters(["getAllJobs"]),
    },

    methods: {
        ...mapActions(["fetchAllJobs", "deleteJob"]),

        destroyJob(id) {
            this.deleteJob(id);
        },
    }, 

    created() {
        this.fetchAllJobs();
    },

}
</script>

<style>

</style>