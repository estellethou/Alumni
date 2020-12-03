<template>
    <div>
        <div v-for="job in getAllJobs" :key="job.id">
            <p> {{ job.title }}</p>
            
            <ListJobsEdit v-bind:job="job" />
            
            <!-- <router-link :to="`/job/edit/${job.id}/${JSON.stringify(job)}`" ><button>Edit Job</button></router-link> -->
            <button @click="destroyJob(job.id)">Delete Job/Internship</button>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import ListJobsEdit from '@/components/JobComponents/ListJobsEdit.vue';


export default {
    name: 'ListJobs',

    components: { ListJobsEdit },

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