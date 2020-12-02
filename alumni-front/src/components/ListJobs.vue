<template>
    <div>
        <div v-for="job in getAllJobs" :key="job.id">
            <p> {{ job.title }}</p>
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
        ...mapActions(["fetchAllJobs"]),
    }, 

    created() {
        this.fetchAllJobs();
    },

}
</script>

<style>

</style>