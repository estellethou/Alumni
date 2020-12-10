<template>
    <div>
        <Header/>
        <div>
            <v-breadcrumbs
                :items="items"
                customDivider
                divider=">"
            ></v-breadcrumbs>
        </div>
        <v-container v-for="(detail, index) in filterJob" :key="index">
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
                                    <p class="side-info"><v-icon> mdi-fountain-pen-tip </v-icon> {{ detail.contract}} </p>
                                    <p class="side-info" v-if="detail.duration"><v-icon> mdi-timer-sand </v-icon> {{ detail.duration}} </p>
                                    <p class="side-info" v-else><v-icon> mdi-timer-sand </v-icon> Full-time </p>
                                    <p class="side-info"><v-icon> mdi-map-marker-minus-outline</v-icon> {{ detail.city}} </p>

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

            <div v-for="(userDetails, index) in getUserDetails" :key="index" >
                <div v-if="detail.id == userDetails.id">
                    <a v-bind:href=" `mailto:${userDetails.email}?subject=Application for ${detail.title} from Coding Academy Alumni job portal!` ">
                        <v-btn class="mt-3" color="info"> Email The Recruiter </v-btn>
                    </a>
                </div>
                
                <div v-if="detail.id == userDetails.id"> 
                    <v-btn @click="openModal" class='secondary mt-3'> Button email recruiter does not work... Click here...</v-btn>
                    <div class="containerModalJob" v-if="isOpen"> <ModalJob v-bind:user="userDetails" v-on:close="updateIsOpen(false)"/> </div>
                    <div class="overlay" v-if="isOpen"></div>
                </div>
                
            </div>
        </v-container>
    </div>
</template>

<script>
import Header from '../components/Header'
import ModalJob from '../components/JobComponents/ModalJob'
import { mapActions, mapGetters } from 'vuex';


export default {
    name: "SingleJob",

    components: {
        Header,
        ModalJob,
    },

    data () {
        return {
            userId: "",
            items: [
                {
                text: 'Homepage',
                disabled: false,
                href: 'https://coding-academy-app.herokuapp.com/',
                },
                {
                text: 'Jobs/Interships',
                disabled: false,
                href: 'https://coding-academy-app.herokuapp.com/job',
                },
            ],
            isOpen: false,
        }
    },

    methods: {
        ...mapActions(["fetchAllJobs", "setUserDetails"]),

        openModal() {
            this.isOpen = true;
        },

        updateIsOpen(opp) {
            this.isOpen = opp;
        },
    },

    computed: {
        ...mapGetters(["getAllJobs", "getUserDetails"]),

        filterJob() {
            return this.getAllJobs.filter(job => {
                return job.id == this.$route.params.id;
            })
        },
    },
    
    created() {
        this.setUserDetails()
        // this.setUser(this.userId)
    },

}
</script>

<style scoped>
.containerModalJob {
    position:fixed;
    background-color:white;
    height: 350px;
    width: 600px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1010;
    border-radius:15px
}
.side-info {
    color: #546E7A;
    font-weight: lighter;
}

.sub-card {
    border: none;
}

</style>