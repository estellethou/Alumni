<template>
    <div>
        <Header/>
        <v-container>
            <v-card outlined>
                <v-card-title>
                    {{ obj.title }}
                </v-card-title>
                <div class="d-flex">
                        <v-card elevation="0" width=25%>
                            <div>
                                <v-card-subtitle class="blue--text text-decoration-underline"> THE COMPANY </v-card-subtitle>
                                <v-card-text>
                                    <p class="side-info"> {{ obj.company_name}} </p>
                                    <p class="side-info"> {{ obj.sector}} </p>
                                </v-card-text>
                            </div>

                            <v-divider class="mx-4"></v-divider>
                            
                            <div>
                                <v-card-subtitle class="blue--text text-decoration-underline"> THE JOB </v-card-subtitle>
                                <v-card-text>
                                    <p class="side-info"> {{ obj.title}} </p>
                                    <p class="side-info"><v-icon> mdi-fountain-pen-tip </v-icon> {{ obj.contract}} </p>
                                    <p class="side-info" v-if="obj.duration"><v-icon> mdi-timer-sand </v-icon> {{ obj.duration}} </p>
                                    <p class="side-info" v-else><v-icon> mdi-timer-sand </v-icon> Full-time </p>
                                    <p class="side-info"><v-icon> mdi-map-marker-minus-outline</v-icon> {{ obj.city}} </p>

                                </v-card-text>
                            </div>
                        </v-card>

                        <v-card class="ml-5" elevation="0" width=75%>
                            <v-card-text>
                                <h1 class="black--text"> <v-icon class="blue--text"> mdi-asterisk </v-icon> Job Description </h1>
                                <v-divider class="mx-4"></v-divider>
                                <p> {{ obj.content }} </p>

                                <h1 class="black--text"> <v-icon class="blue--text"> mdi-asterisk </v-icon> Profile</h1>
                                <v-divider class="mx-4"></v-divider>
                                <p> {{ obj.profile}} </p>
                                <p> {{ obj.year_experiences}} </p>

                                <h1 class="black--text"> <v-icon class="blue--text"> mdi-asterisk </v-icon> Qualifications</h1>
                                <v-divider class="mx-4"></v-divider>
                                <p> {{ obj.qualifications}} </p>

                            </v-card-text>
                        </v-card>
                </div>
            </v-card>
        </v-container>
    </div>
</template>

<script>
import Header from "../components/Header"
export default {
    name:"SingleJobRecruter",

    components:{
        Header
    },
    props:{
        job:String
    },

    data(){
        return{
            obj:JSON.parse(this.$route.params.job)
        }
    }
}
</script>

<style>

</style>