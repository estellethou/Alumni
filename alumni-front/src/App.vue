<template>
 <v-app>
  <div id="app">
    <router-view/>
  </div>
  <Footer />
   </v-app>
</template>

<script>
import Footer from '@/components/Footer'

export default {
  name:"App",
  
  components:{
    Footer
  }
}
</script>

<style>
</style>
