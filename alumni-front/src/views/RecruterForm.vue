<template>
<div>
    <h1>Form Recruter to post new job offer </h1>
    <v-container>
        <v-form @submit="submitRecruterForm">
            <v-text-field outlined color="primary" label="Job title" v-model="jobTitle"></v-text-field>
            <v-text-field label="Description" v-model="description"></v-text-field>
            <v-text-field label="Profile" v-model="profile"></v-text-field>
            <v-text-field label="Qualification" v-model="qualifications"></v-text-field>
            <v-text-field label="Experience" v-model="experience"></v-text-field>
            <v-text-field label="Address" v-model="address"></v-text-field>
            <v-text-field label="City" v-model="city"></v-text-field>
            <v-text-field label="Postal code" v-model="postalCode"></v-text-field>
            <v-text-field label="Contract" v-model="contract"></v-text-field>
            <v-text-field label="Contract duration" v-model="contractDuration"></v-text-field>
            <v-text-field label="Compagny" v-model="company"></v-text-field>
            <v-text-field label="Sector" v-model="sector"></v-text-field>
            <router-link to="/recruter/payment"><v-btn type="submit">Submit</v-btn></router-link>
        </v-form>

      </v-container>
</div>
</template>

<script>
import {mapActions} from "vuex"
export default {
    name:"RecruterForm",

    data(){
        return{
            jobTitle:"",
            description:"",
            profile:"",
            qualifications:"",
            experience:"",
            address:"",
            postalCode:"",
            city:"",
            contract:"",
            contractDuration:"",
            company:"",
            sector:"",

            clicked:false,
            res:0
        }
    },

    methods:{

        ...mapActions(["addJob"]),
        submitRecruterForm(){
            event.preventDefault()
            let newJobOffer={
                title: this.jobTitle,
                content: this.description,
                profile: this.profile,
                qualifications: this.qualifications,
                year_experiences: parseInt(this.experience),
                street_address: this.address,
                postal_code: this.postalCode,
                city: this.city,
                contract: this.contract,
                contract_duration: this.contractDuration,
                company_name: this.company,
                sector: this.sector,
                user_id: 1, //NEED TO CHECK THE USER_ID
            }
            this.jobTitle=""
            this.description=""
            this.profile="",
            this.qualifications=""
            this.experience=""
            this.address=""
            this.postalCode=""
            this.city=""
            this.contract=""
            this.contractDuration=""
            this.company=""
            this.sector=""

            if(this.res > 1){
                 this.addJob(newJobOffer)
            }
        },
    
    }
}
</script>

<style>

</style>