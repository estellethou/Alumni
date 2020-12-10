<template>
  <div>
          <Header/>
    <v-container class="payment">
      <!-- <div class="d-flex col-12">
      <v-text-field label="Email" v-model="email"></v-text-field>
      </div>
      <div class="d-flex justify-content-between">
        <v-text-field class="col-6" label="Firstname" v-model="firstname"></v-text-field>
        <v-text-field class="col-6" label="Lastname" v-model="lastname"></v-text-field>
      </div> -->
      <stripe-elements
        ref="elementsRef"
        :pk="publishableKey"
        :amount="amount"
        locale="fr"
        @token="tokenCreated"
        @loading="loading = $event"
      >
      </stripe-elements>
      <div class="d-flex justify-content-center">
      <v-btn color="primary" @click="submit">Pay {{ amount }}€</v-btn>
      </div>
      <h1>{{sucessMsg}}</h1>
       <router-link :to="`/`">
           <v-btn>HOME</v-btn>
       </router-link>
    </v-container>
  </div>
</template>

<script>
import { StripeElements } from "vue-stripe-checkout";
import Header from "./../components/Header"
import axios from "axios";
export default {
  components: {
    StripeElements,
    Header
  },
  data: () => ({
    loading: false,
    amount: 50,
    publishableKey:
      "pk_test_51HwTLSBi6kcWeMI4Dhz1quF7Ewmu5YJkqOs6jdjSlsZYETAVPVOnn3YtqH4WoAgxh4Khw1cz5T6mtbHpYuHUmnuP00gIIrkx2D",
    token: null,
    charge: null,
    sucessMsg: null,
    bool: false,
    //email: null,
    //firstname: null,
    //lastname: null,
  }),
  methods: {
    submit() {
      this.$refs.elementsRef.submit();
    },
    tokenCreated(token) {
      this.token = token;
      // for additional charge objects go to https://stripe.com/docs/api/charges/object
      this.charge = {
        //email: this.email,
        source: token.id,
        amount: this.amount, // the amount you want to charge the customer in cents. $100 is 1000 (it is strongly recommended you use a product id and quantity and get calculate this on the backend to avoid people manipulating the cost)
        description: this.description, // optional description that will show up on stripe when looking at payments
        //lastname: this.lastname,
        //firstname: this.firstname
      };
      this.sendTokenToServer(this.charge);
    },
    sendTokenToServer(charge) {
      axios
        .post("/checkout", charge)
        .then((response) => {
          this.sucessMsg = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style>
.payment {
  margin-top: 100px;
  width: 50%;
}
</style>
