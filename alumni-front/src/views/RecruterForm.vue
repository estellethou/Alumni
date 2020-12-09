<template>
<div>
    <Header/>
    <h1>Recruiter form to post new job offer </h1>
    <v-container>
        <v-row class="m-3">
            <v-dialog
            v-model="dialog"
            width="500"
            >
                <template v-slot:activator="{ on, attrs }" v-if="user.role == 'alumni'">
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
                    <v-form @submit="submitRecruterForm" v-if="user.role == 'alumni'">
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
                                    <router-link to="/recruter/payment">
                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            type="submit"
                                            @click="dialog = false"
                                        >
                                            Submit
                                        </v-btn>
                                    </router-link>
                                </v-card-actions>
                        </v-card>
                    </v-form>

                    <h1 v-else>For company only... sorry</h1>
                </div>
            </v-dialog>
        </v-row>
    </v-container>
</div>
</template>

<script>
import { mapActions, mapGetters } from "vuex"
import Header from "./../components/Header"
export default {
    name:"RecruterForm",

    components:{
        Header,
    },
    
    data(){
        return{
            dialog: false,
            itemsExp: ['Beginner (less than 1 year)', 'First Experience (1-2 years)', 'Experienced (2-5 years)', 'Confirmed (5 years and more)'],
            itemsContract: ['Permanent Contract', 'Fixed Term Contract /Temporary Contract', 'Contractors/Freelance', 'Internship', 'Work-Study Contract'],
            itemsSector: ['Banking', 'Engineering / Consultancy', 'Finance', 'Industry', 'IT'],
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
                year_experiences: this.experience.join(', '),
                street_address: this.address,
                postal_code: this.postalCode,
                city: this.city,
                contract: this.contract,
                contract_duration: this.contractDuration,
                company_name: this.company,
                sector: this.sector.join(', '),
                user_id: this.user.id,
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
    },

    computed: {
        ...mapGetters(["user"])
    },
}
</script>

<style>

</style>