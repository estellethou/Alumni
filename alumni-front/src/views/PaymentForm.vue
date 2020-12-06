<template>
  <div>
    <stripe-elements
      ref="elementsRef"
      :pk="publishableKey"
      :amount="amount"
      locale="fr"
      @token="tokenCreated"
      @loading="loading = $event"
    >
    </stripe-elements>
    <button @click="submit">Pay ${{amount / 100}}</button>
  </div>
</template>

<script>
import {StripeElements} from "vue-stripe-checkout"
import axios from "axios"
export default {
    name:"PaymentForm",
    components:{
      StripeElements
    },
    data: () => ({
    loading: false,
    amount: 1000,
    publishableKey:"pk_test_51Hv1eyFhtlvYcgIazUDc3j00yWrIfgjjtoDvEMeEWsMK3b49R0HAGbTlVijw2yv2cd28x8ohYDtJPSk44QPjdPKU00DUe6J3RG", 
    token: null,
    charge: null
  }),
  methods: {
    submit () {
      this.$refs.elementsRef.submit();
    },
    tokenCreated (token) {
      this.token = token;
      // for additional charge objects go to https://stripe.com/docs/api/charges/object
      this.charge = {
        source: token.id,
        amount: this.amount, // the amount you want to charge the customer in cents. $100 is 1000 (it is strongly recommended you use a product id and quantity and get calculate this on the backend to avoid people manipulating the cost)
        description: this.description // optional description that will show up on stripe when looking at payments
      }
      this.sendTokenToServer(this.charge);
    },
    sendTokenToServer (charge) {
      console.log(charge)
      // Send to charge to your backend server to be processed
      // Documentation here: https://stripe.com/docs/api/charges/create

      const response =axios.post("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/checkout")
      console.log(response)
    }
  }
}
</script>

<style>

</style>