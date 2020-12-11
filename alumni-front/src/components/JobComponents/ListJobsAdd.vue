<template>
    <div>
        <v-row class="m-3">
            <v-dialog
            v-model="dialog"
            width="750"
            >
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                    class="ml-15"
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
                    <v-form ref="newJobForm" v-model="valid" lazy-validation> 
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
                                        required
                                        v-model="jobTitle"
                                        :rules="titleRules"
                                    ></v-text-field>
                                <!-- </v-col> -->
                            
                                

                                <!-- content -->
                                    <v-textarea
                                        auto-grow
                                        clearable
                                        counter
                                        label="Job Description *"
                                        id="content"
                                        name="content"
                                        required
                                        v-model="description"
                                        :rules="descriptionRules"
                                    ></v-textarea>

                                <!-- Profile -->
                                    <v-text-field
                                        label="Candidate Profile *"
                                        id="profile"
                                        name="profile"
                                        required
                                        v-model="profile"
                                        :rules="generalRules"
                                    ></v-text-field>

                                <!-- Qualifications -->
                                    <v-text-field
                                        label="Qualifications/Skills *"
                                        id="qualifications"
                                        name="qualifications"
                                        required
                                        v-model="qualifications"
                                        :rules="generalRules"
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
                                            required
                                            :items="itemsExp"
                                            :rules="generalRules"
                                        ></v-select>
                                    </v-col>

                                <!-- Address -->
                                    <v-text-field
                                        label="Address *"
                                        id="street_address"
                                        name="street_address"
                                        required
                                        v-model="address"
                                        :rules="generalRules"
                                    ></v-text-field>

                                <!-- Postal Code -->
                                    <v-text-field
                                        label="Postal Code *"
                                        id="postal_code"
                                        name="postal_code"
                                        required
                                        v-model="postalCode"
                                        :rules="postalCodeRules"
                                    ></v-text-field>

                                <!-- City -->
                                    <v-text-field
                                        label="City *"
                                        id="city"
                                        name="city"
                                        required
                                        v-model="city"
                                        :rules="generalRules"
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
                                            required
                                            :items="itemsContract"
                                            :rules="generalRules"
                                        ></v-select>
                                    </v-col>

                                <!-- Contract Duration -->
                                    <v-text-field
                                        label="Duraction of Contract (optional)"
                                        id="contract_duration"
                                        name="contract_duration"
                                        required
                                        v-model="contractDuration"
                                    ></v-text-field>

                                <!-- Company Name -->
                                    <v-text-field
                                        label="Company Name *"
                                        id="company_name"
                                        name="company_name"
                                        required
                                        v-model="company"
                                        :rules="generalRules"
                                    ></v-text-field>

                                <!-- Sector -->
                                    <v-col
                                        cols="12"
                                        md="10"
                                    >
                                        <v-select
                                            label="Sector (optional)"
                                            attach
                                            chips
                                            id="sector"
                                            name="sector"
                                            multiple
                                            required
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
                                        :disabled="!valid"
                                        text
                                        type="submit"
                                        @click="submitNewJob"
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
            valid: true,
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
            titleRules: [
                v => !!v || 'Title is required',
                v => 3 <= v.length || 'Title must be at least 3 characters.',
            ],
            descriptionRules: [
                v => !!v || 'Description is required',
                v => 10 <= v.length || 'Description must be at least 10 characters.',
            ],
            postalCodeRules: [
                v => !!v || 'Postal Code is required and must be numbers',
                v => 5 <= v.length || 'Postal must be exactly 5 characters.',
                v => v.length <= 5 || 'Postal must be exactly 5 characters.',
                // v => v.number || 'Postal code must be digits.', does not work
            ],
            generalRules: [
                v => !!v || 'Field is required',
            ],
        };
    },

    methods: {
        ...mapActions(["addJob"]),

        submitNewJob() {
            event.preventDefault();
            if (this.$refs.newJobForm.validate()) {

                if (this.sector != []) {
                    let newJob = {
                        title: this.jobTitle,
                        content: this.description,
                        profile: this.profile,
                        qualifications: this.qualifications,
                        year_experiences: this.exp.join(', '),
                        street_address: this.address,
                        postal_code: this.postalCode,
                        city: this.city,
                        contract: this.contract,
                        contract_duration: this.contractDuration,
                        company_name: this.company,
                        sector: this.sector.join(', '),
                        user_id: this.user.id,
                    }
                    this.addJob(newJob);
                    this.dialog = false;
                } else {
                    let newJob = {
                        title: this.jobTitle,
                        content: this.description,
                        profile: this.profile,
                        qualifications: this.qualifications,
                        year_experiences: this.exp.join(', '),
                        street_address: this.address,
                        postal_code: this.postalCode,
                        city: this.city,
                        contract: this.contract,
                        contract_duration: this.contractDuration,
                        company_name: this.company,
                        user_id: this.user.id,
                    }
                    this.addJob(newJob);
                    this.dialog = false;
                }
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
            }
        },
    }

}
</script>

<style>

</style>