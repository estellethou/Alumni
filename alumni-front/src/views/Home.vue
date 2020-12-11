<template>
  <div class="home">
        <Header/> 
        <Grid/>
        <Footer/>
  </div>
</template>


<script>
import Header from "./../components/Header"
import Grid from "./../components/Grid"
import Footer from "../components/Footer"
export default {
  name:"Home",
  
  components:{
   Header,
   Grid,
    Footer,
  }
}
</script>

<style>
.background-home {
  background-image: url("https://coding-academy-alumni.herokuapp.com/icons/home.jpg");
  background-size: 100% 300px;
  height: 300px;
}

.menu {
  display: flex;
  width: 50%;
  height: 2rem;
  padding: 0 !important;
  margin: 0 !important;
}

.menu1 {
  padding: 0;
  margin: 0;
}

.btn {
  outline: none !important;
}
</style>