<template>
    <div class="d-flex flex-wrap justify-center">
        <div class="container-link" v-for="job in filteredJob" :key="job.id">
            <v-card class="m-3" width=350 min-height=250>
                <router-link v-bind:to="`/job/${job.id}`">
                    <v-card-title class="title-rendering"> {{ job.title }}</v-card-title>
                    <v-card-subtitle><v-icon></v-icon> at {{ job.company_name }} </v-card-subtitle>
                    <v-card-text class="black--text">
                        <div class="d-flex">
                            <p class="mr-3"><v-icon> mdi-fountain-pen-tip </v-icon> {{ job.contract }}</p>
                            <p><v-icon> mdi-map-marker-minus-outline</v-icon> {{ job.city}}</p>
                        </div>
                        <div>
                            <p><v-icon> mdi-calendar-month-outline </v-icon> {{ timeAgo(Date.parse(job.created_at)) }}</p>
                        </div>
                    </v-card-text>
                </router-link>
                
                <div class="d-flex">
                    <ListJobsEdit v-bind:job="job" v-if="job.user_id == user.id" />
                    
                    <!-- <router-link :to="`/job/edit/${job.id}/${JSON.stringify(job)}`" ><button>Edit Job</button></router-link> -->
                    <v-btn class="error m-3" elevation="12" small @click="destroyJob(job.id)" v-if="job.user_id == user.id">Delete</v-btn>
                </div>
            </v-card>
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

        timeAgo: (date) => {
        var seconds = Math.floor((new Date() - date) / 1000);
        var interval = seconds / 31536000;

        if (interval > 1) {
            return Math.floor(interval) + " years ago";
        }
        interval = seconds / 2592000;
        if (interval > 1) {
            return Math.floor(interval) + " months ago";
        }
        interval = seconds / 86400;
        if (interval > 1) {
            return Math.floor(interval) + " days ago";
        }
        interval = seconds / 3600;
        if (interval > 1) {
            return Math.floor(interval) + " hours ago";
        }
        interval = seconds / 60;
        if (interval > 1) {
            return Math.floor(interval) + " minutes ago";
        }
        if (Math.floor(seconds) < 30) return "just now";
        else return "few seconds ago";
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

.title-rendering {
    color: black !important;
    font-weight: bold;

}


</style>