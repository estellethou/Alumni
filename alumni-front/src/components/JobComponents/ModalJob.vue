<template>
    <div>
        <v-container>
            <p>We are not sure why the email recruiter button did not work... we will debug it ASAP @The Queen :-) <br>
                But in the meantime, please find below the recruiter contact details so you can apply ASAP to your dream job :-) <br>
                Sorry for the inconvenience, and thanks for your understanding.</p>

            <v-list flat>
                    <v-list-item>
                        <p><v-icon class="blue--text"> mdi-badge-account-horizontal-outline </v-icon> {{ user.firstname }} </p>
                    </v-list-item>
                    <v-list-item>
                        <p><v-icon class="blue--text"> mdi-badge-account-horizontal-outline </v-icon> {{ user.lastname }} </p>
                    </v-list-item>
                    <v-list-item>
                        <p><v-icon class="blue--text"> mdi-email-check-outline </v-icon> {{ user.email }} </p>
                    </v-list-item>
            </v-list>

            <v-btn @click="closeModal">Close</v-btn>
        </v-container>

        <v-container>
            
        </v-container>
    </div>
</template>

<script>
export default {
    props: ["user"],

    name: "modalJob",

    methods: {

        closeModal() {
            this.$emit('close', false)
        },
    },
}
</script>

<style>

</style>