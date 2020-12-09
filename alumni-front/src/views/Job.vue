<template>
    <div>
         <Header/>
        <div class="Job">
            <h1>Hello from Job</h1>
            <div class="d-flex m-2 align-center size-input">
                <v-icon medium> mdi-magnify </v-icon>
                <v-text-field
                    name="search"
                    placeholder="Your dream Job?"
                    v-model="search"
                    :keyup="searchJob" 
                ></v-text-field>
            </div>
            <ListJobsAdd />
            <ListJobs v-bind:filteredJob="searchJob" />
        </div>
        <div> 
        <GoogleMap />
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex"
import ListJobs from "@/components/JobComponents/ListJobs.vue"
import ListJobsAdd from "@/components/JobComponents/ListJobsAdd.vue"
import Header from "./../components/Header"
import GoogleMap from "@/components/GoogleMap.vue"



export default {
    name: 'Job',

    data() {
        return {
            search: "",
        }
    },

    components: {
        ListJobsAdd,
        ListJobs,
        GoogleMap,
        Header
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

<style>

.size-input {
    width: 30%;
}

</style>
