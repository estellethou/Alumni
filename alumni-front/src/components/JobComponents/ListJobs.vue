<template>
    <div>
        <div class="container-link" v-for="job in filteredJob" :key="job.id">
            <router-link v-bind:to="`/job/${job.id}`">
                <h1> {{ job.title }}</h1>
                <p>{{ job.content }}</p>
            </router-link>
            
            <div class="d-flex">
                <ListJobsEdit v-bind:job="job" v-if="job.user_id == user.id" />
                
                <!-- <router-link :to="`/job/edit/${job.id}/${JSON.stringify(job)}`" ><button>Edit Job</button></router-link> -->
                <v-btn class="error m-3" elevation="12" small @click="destroyJob(job.id)" v-if="job.user_id == user.id">Delete</v-btn>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import ListJobsEdit from '@/components/JobComponents/ListJobsEdit.vue';


export default {
    props:["filteredJob"],

    name: 'ListJobs',

    components: { ListJobsEdit },

    methods: {
        ...mapActions(["deleteJob"]),

        destroyJob(id) {
            this.deleteJob(id);
        },
    },

    computed: {
        ...mapGetters(["user"])
    }

}
</script>

<style>

.container-link a {
    text-decoration: none;
}

.container-link h1 {
    color: black;
}

.container-link p {
    color: black;
}

</style>