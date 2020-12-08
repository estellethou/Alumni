<template>
    <div>
        <v-container v-for="(detail, index) in filterJob" :key="index">
            <v-card>
                <v-card-title>
                    {{ detail.title }}
                </v-card-title>
                <div class="d-flex" width=50%>
                    <div class="d-flex-column">
                        <v-card>
                            <v-card-subtitle> The Company </v-card-subtitle>
                            <v-card-text>
                                <p> {{ detail.company_name}} </p>
                                <p> {{ detail.sector}} </p>
                            </v-card-text>
                        </v-card>

                        <v-card>
                            <v-card-subtitle> The Job </v-card-subtitle>
                            <v-card-text>
                                <p> {{ detail.company_name}} </p>
                                <p> {{ detail.sector}} </p>
                            </v-card-text>
                        </v-card>
                    </div>

                    <v-card width=50%>
                        <v-card-text>
                            <h1>Job Description</h1>
                            {{ detail.content }}

                            <h1>Profile</h1>
                            {{ detail.profile}}

                            <h1>Qualifications</h1>
                            {{ detail.qualifications}}
                        </v-card-text>
                    </v-card>
                </div>
            </v-card>
        </v-container>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
    name: "SingleJob",

    methods: {
        ...mapActions(["fetchAllJobs"]),
    },

    computed: {
        ...mapGetters(["getAllJobs"]),

        filterJob() {
            return this.getAllJobs.filter(job => {
                return job.id == this.$route.params.id;
            })
        },
    }

}
</script>

<style>

</style>