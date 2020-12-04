<template>
    <div>
        <div v-for="job in filteredJob" :key="job.id">
            <h1> {{ job.title }}</h1>
            <p>{{ job.content }}</p>
            
            <!-- <ListJobsEdit v-bind:job="job" /> -->
            
            <!-- <router-link :to="`/job/edit/${job.id}/${JSON.stringify(job)}`" ><button>Edit Job</button></router-link> -->
            <button @click="destroyJob(job.id)">Delete Job/Internship</button>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
// import ListJobsEdit from '@/components/JobComponents/ListJobsEdit.vue';


export default {
    props:["filteredJob"],

    name: 'ListJobs',

    // components: { ListJobsEdit },

    methods: {
        ...mapActions(["deleteJob"]),

        destroyJob(id) {
            this.deleteJob(id);
        },
    }, 

}
</script>

<style>

</style>