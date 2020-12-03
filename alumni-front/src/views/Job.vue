<template>
    <div class="Job">
        <h1>Hello from Job</h1>
        <div>
            <label class="label">Searching Bar</label>
            <input :keyup="searchJob" type="text" v-model="search" name="search">
        </div>
        <!-- <ListJobsAdd /> -->
        <ListJobs v-bind:filteredJob="searchJob" />
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex"
import ListJobs from "@/components/JobComponents/ListJobs.vue"
// import ListJobsAdd from "@/components/JobComponents/ListJobsAdd.vue"


export default {
    name: 'Job',

    data() {
        return {
            search: "",
        }
    },

    components: {
        // ListJobsAdd,
        ListJobs,
    },

    computed: {
        ...mapGetters(["getAllJobs"]),
        
        searchJob() {
            return this.getAllJobs.filter(job =>{
                let titleLowerCase = job.title.toLowerCase() + job.content.toLowerCase();
                let search = this.search.toLowerCase()
                return titleLowerCase.match(search)
            })
        },
    },

    methods:{
        ...mapActions(["fetchAllJobs"])
    },

    created() {
        this.fetchAllJobs();
    },

}
</script>
