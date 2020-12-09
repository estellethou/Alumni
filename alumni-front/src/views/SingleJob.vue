<template>
    <div>
        <v-container v-for="(detail, index) in filterJob" :key="index">
            <!-- <div>{{ getId( detail.user_id)}}</div> -->
            <v-card outlined>
                <v-card-title>
                    {{ detail.title }}
                </v-card-title>
                <div class="d-flex">
                        <v-card elevation="0" width=25%>
                            <div>
                                <v-card-subtitle class="blue--text text-decoration-underline"> THE COMPANY </v-card-subtitle>
                                <v-card-text>
                                    <p class="side-info"> {{ detail.company_name}} </p>
                                    <p class="side-info"> {{ detail.sector}} </p>
                                </v-card-text>
                            </div>

                            <v-divider class="mx-4"></v-divider>
                            
                            <div>
                                <v-card-subtitle class="blue--text text-decoration-underline"> THE JOB </v-card-subtitle>
                                <v-card-text>
                                    <p class="side-info"> {{ detail.title}} </p>
                                    <p class="side-info"> {{ detail.contract}} </p>
                                    <p class="side-info"> {{ detail.duration}} </p>
                                    <p class="side-info"> {{ detail.city}} </p>

                                </v-card-text>
                            </div>
                        </v-card>

                        <v-card class="ml-5" elevation="0" width=75%>
                            <v-card-text>
                                <h1 class="black--text"> <v-icon class="blue--text"> mdi-asterisk </v-icon> Job Description </h1>
                                <v-divider class="mx-4"></v-divider>
                                <p> {{ detail.content }} </p>

                                <h1 class="black--text"> <v-icon class="blue--text"> mdi-asterisk </v-icon> Profile</h1>
                                <v-divider class="mx-4"></v-divider>
                                <p> {{ detail.profile}} </p>
                                <p> {{ detail.year_experiences}} </p>

                                <h1 class="black--text"> <v-icon class="blue--text"> mdi-asterisk </v-icon> Qualifications</h1>
                                <v-divider class="mx-4"></v-divider>
                                <p> {{ detail.qualifications}} </p>

                            </v-card-text>
                        </v-card>
                </div>
            </v-card>
        </v-container>

        <div v-for="(user, index) in getUserDetails" :key="index" >
            {{ user.email }}
            {{ user.firstname }}
            {{ user.lastname }}
            <a href="`mailto:${detail.title}?subject=Application for ${detail.title} from Coding Alumni Website`">
                <v-btn class="ml-13" color="info"> Interested </v-btn>
            </a>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
    name: "SingleJob",

    data () {
        return {
            userId: "",
        }
    },

    methods: {
        ...mapActions(["fetchAllJobs", "setUserDetails"]), // "setUser"

        // getId(id) {
        //     this.userId = id;
        //     console.log(this.userId)
        //     return this.userId;
        // }
    },

    computed: {
        ...mapGetters(["getAllJobs", "getUserDetails"]), // "getOneUser"

        filterJob() {
            return this.getAllJobs.filter(job => {
                return job.id == this.$route.params.id;
            })
        },
    },
    
    created() {
        this.setUserDetails()
        // this.setUser(this.userId)
    }

}
</script>

<style>

.side-info {
    color: #546E7A;
    font-weight: lighter;
}

.sub-card {
    border: none;
}

</style>