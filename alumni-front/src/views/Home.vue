<template>
  <div class="home">
        <Header/> 
        <h1>Hello from HOME</h1>
  </div>
</template>


<script>
import Header from "./../components/Header"
export default {
  name:"Home",
  
  components:{
   Header,
  }
}
</script>

<style>
.background-home {
  background-image: url("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/home.jpg");
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