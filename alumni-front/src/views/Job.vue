<template>
    <div>
        <Header/>
        <div class="Job">
            <div class="d-flex m-2 ml-15 size-input">
                <v-icon medium> mdi-magnify </v-icon>
                <v-text-field
                    name="search"
                    placeholder="Your dream Job?"
                    v-model="search"
                    :keyup="searchJob" 
                ></v-text-field>
            </div>
            <ListJobsAdd />
            <ListJobs v-bind:filteredJob="paginatedData" />
        </div>

        <div class="containerPaginationComment">
            <v-btn class="mr-2" @click="previousPage" :disabled="pageNumber==0" color="primary">prev</v-btn>
            <v-btn class="ml-2" @click="nextPage" :disabled="pageNumber >= pageCount -1" color="primary">next</v-btn>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex"
import ListJobs from "@/components/JobComponents/ListJobs.vue"
import ListJobsAdd from "@/components/JobComponents/ListJobsAdd.vue"
import Header from "./../components/Header"

export default {
    name: 'Job',

    data() {
        return {
            search: "",
            pageNumber:0,
            size:10
        }
    },

    components: {
        ListJobsAdd,
        ListJobs,
        Header
    },

    computed: {
        ...mapGetters(["getAllJobs"]),
        
        searchJob() {
            return this.getAllJobs.filter(job =>{
                let titleLowerCase = job.title.toLowerCase() + job.city.toLowerCase() + job.contract.toLowerCase() + job.company_name.toLowerCase();
                let search = this.search.toLowerCase()
                return titleLowerCase.match(search)
            })
        },

        paginatedData(){
            const start = this.pageNumber * this.size,
            end = start +this.size
            return this.searchJob.slice(start,end)
        },
    
        pageCount(){
            let l = this.searchJob.length,
            s = this.size
            return Math.ceil(l/s)
        },
    },

    methods:{
        ...mapActions(["fetchAllJobs"]),

        previousPage(){
            window.scrollTo(0,0);
            return this.pageNumber --
        },
        nextPage(){
            window.scrollTo(0,0);
            return this.pageNumber ++
        },
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
