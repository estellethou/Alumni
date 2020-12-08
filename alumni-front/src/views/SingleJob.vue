<template>
    <div>
        <v-container v-for="(detail, index) in filterJob" :key="index">
            <v-card>
                <v-card-title>
                    {{ detail.title }}
                </v-card-title>
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