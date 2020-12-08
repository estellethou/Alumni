<template>
    <div>
        <v-row class="m-3">
            <v-dialog
            v-model="dialog"
            width="500"
            >
                <template v-slot:activator="{ on, attrs }" v-if="user.role == 'alumni'"> <!-- ToDO: verify where to put the condition -->
                    <v-btn
                    color="primary"
                    dark
                    v-bind="attrs"
                    v-on="on"
                    >
                    Create a Job/Internship add
                    </v-btn>
                </template>

                <div>
                    <!-- new job/intership form ===================== -->
                    <v-form @submit="submitNewJob"> 
                        <v-card>

                            <v-card-title>
                                <span class="headline"> Add your Job or Internship offer </span>
                            </v-card-title>

                            <v-card-text class="ml-1">
                                * Mandatory fields
                            </v-card-text>

                            <v-card-text>
                                <!-- Title -->
                                    <v-text-field
                                        label="Title *"
                                        id="title"
                                        name="title"
                                        v-model="jobTitle"
                                    ></v-text-field>
                                <!-- </v-col> -->
                            
                                

                                <!-- content -->
                                    <v-textarea
                                        auto-grow
                                        clearable
                                        count
                                        label="Job Description *"
                                        id="content"
                                        name="content"
                                        v-model="description"
                                    ></v-textarea>

                                <!-- Profile -->
                                    <v-text-field
                                        label="Candidate Profile *"
                                        id="profile"
                                        name="profile"
                                        v-model="profile"
                                    ></v-text-field>

                                <!-- Qualifications -->
                                    <v-text-field
                                        label="Qualifications/Skills *"
                                        id="qualifications"
                                        name="qualifications"
                                        v-model="qualifications"
                                    ></v-text-field>

                                <!-- Experience -->
                                    <v-col
                                        cols="12"
                                        md="10"
                                    >
                                        <v-select
                                            label="Years of Experience *"
                                            attach
                                            chips
                                            id="year_experiences"
                                            name="year_experiences"
                                            multiple
                                            v-model="exp"
                                            :items="itemsExp"
                                        ></v-select>
                                    </v-col>

                                <!-- Address -->
                                    <v-text-field
                                        label="Address *"
                                        id="street_address"
                                        name="street_address"
                                        v-model="address"
                                    ></v-text-field>

                                <!-- Postal Code -->
                                    <v-text-field
                                        label="Postal Code *"
                                        id="postal_code"
                                        name="postal_code"
                                        v-model="postalCode"
                                    ></v-text-field>

                                <!-- City -->
                                    <v-text-field
                                        label="City *"
                                        id="city"
                                        name="city"
                                        v-model="city"
                                    ></v-text-field>

                                <!-- Contract -->
                                    <v-col
                                        cols="12"
                                        md="10"
                                    >
                                        <v-select
                                            label="Type of Contract *"
                                            attach
                                            chips
                                            id="contract"
                                            name="contract"
                                            v-model="contract"
                                            :items="itemsContract"
                                        ></v-select>
                                    </v-col>

                                <!-- Contract Duration -->
                                    <v-text-field
                                        label="Duraction of Contract (optional)"
                                        id="contract_duration"
                                        name="contract_duration"
                                        v-model="contractDuration"
                                    ></v-text-field>

                                <!-- Company Name -->
                                    <v-text-field
                                        label="Company Name *"
                                        id="company_name"
                                        name="company_name"
                                        v-model="company"
                                    ></v-text-field>

                                <!-- Sector -->
                                    <v-col
                                        cols="12"
                                        md="10"
                                    >
                                        <v-select
                                            label="Sector"
                                            attach
                                            chips
                                            id="sector"
                                            name="sector"
                                            multiple
                                            v-model="sector"
                                            :items="itemsSector"
                                        ></v-select>
                                    </v-col>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        @click="dialog = false"
                                    >
                                        Close
                                    </v-btn>
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        type="submit"
                                        @click="dialog = false"
                                    >
                                        Create
                                    </v-btn>
                                </v-card-actions>
                        </v-card>
                    </v-form>
                </div>
            </v-dialog>
        </v-row>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
    name: 'ListJobsAdd',

    computed: {
        ...mapGetters(["user"])
    },
    

    data() {
        return {
            dialog: false,
            itemsExp: ['Beginner (less than 1 year)', 'First Experience (1-2 years)', 'Experienced (2-5 years)', 'Confirmed (5 years and more)'],
            itemsContract: ['Permanent Contract', 'Fixed Term Contract /Temporary Contract', 'Contractors/Freelance', 'Internship', 'Work-Study Contract'],
            itemsSector: ['Banking', 'Engineering / Consultancy', 'Finance', 'Industry', 'IT'],
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
                year_experiences: JSON.stringify(this.exp.join(', ')),
                street_address: this.address,
                postal_code: this.postalCode,
                city: this.city,
                contract: this.contract,
                contract_duration: this.contractDuration,
                company_name: this.company,
                sector: JSON.stringify(this.sector.join(', ')),
                user_id: this.user.id,
            };
            console.log(newJob);
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
    }

}
</script>

<style>

</style>