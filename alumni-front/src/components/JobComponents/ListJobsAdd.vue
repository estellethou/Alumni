<template>
    <div>
        <div class="container">
            <h1>Create a new Job/Internship</h1>

            <!-- new job/intership form ===================== -->
            <form @submit="submitNewJob"> 
                <!-- title -->
                <div>
                    <label class="label">Job Title</label>
                    <input v-model="jobTitle" name="jobTitle">
                </div>

                <!-- content -->
                <div>
                    <label class="label">Job Description</label>
                    <textarea v-model="description" name="description"></textarea>
                </div>

                <!-- Profile -->
                <div>
                    <label class="label">Candidate Profile</label>
                    <input v-model="profile" name="profile">
                </div>

                <!-- Qualifications -->
                <div>
                    <label class="label">Qualifications</label>
                    <input v-model="qualifications" name="qualifications">
                </div>

                <!-- Experience -->
                <div>
                    <label class="label">Years of Exeperience</label>
                    <input v-model="exp" name="experiences">
                </div>

                <!-- Address -->
                <div>
                    <label class="label">Street Address</label>
                    <input v-model="address" name="address">
                </div>

                <!-- Postal Code -->
                <div>
                    <label class="label">Postal Code</label>
                    <input v-model="postalCode" name="postalCode">
                </div>

                <!-- City -->
                <div>
                    <label class="label">City</label>
                    <input v-model="city" name="city">
                </div>

                <!-- Contract -->
                <div>
                    <label class="label">Type of Contract</label>
                    <input v-model="contract" name="contract">
                </div>

                <!-- Contract Duration -->
                <div>
                    <label class="label">Duration of Contract</label>
                    <input v-model="contractDuration" name="contractDuration">
                </div>

                <!-- Company Name -->
                <div>
                    <label class="label">Company Name</label>
                    <input v-model="company" name="company">
                </div>

                <!-- Sector -->
                <div class="field">
                    <label class="label">Sector</label>
                    <input v-model="sector" name="sector">
                </div>

                <!-- submit button -->
                <div>
                    <button type="submit">Create Job/Internship</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    name: 'ListJobsAdd',

    data() {
        return {
            jobTitle: "",
            description: "",
            profile: "",
            qualifications: "",
            exp: "",
            address: "",
            postalCode: "",
            city: "",
            contract: "",
            contractDuration: "",
            company: "",
            sector: "",
        };
    },

    methods: {
        ...mapActions(["addJob"]),

        submitNewJob() {
            event.preventDefault();
            let newJob = {
                title: this.jobTitle,
                content: this.description,
                profile: this.profile,
                qualifications: this.qualifications,
                year_experiences: parseInt(this.exp),
                street_address: this.address,
                postal_code: this.postalCode,
                city: this.city,
                contract: this.contract,
                contract_duration: this.contractDuration,
                company_name: this.company,
                sector: this.sector,
                user_id: 1, // toDo: change with user_id
            };
            this.addJob(newJob);
            this.jobTitle = "";
            this.description = "";
            this.profile = "";
            this.qualifications = "";
            this.exp = "";
            this.address = "";
            this.postalCode = "";
            this.city = "";
            this.contract = "";
            this.contractDuration = "";
            this.company = "";
            this.sector = "";
        },

    }, 

}
</script>

<style>

</style>