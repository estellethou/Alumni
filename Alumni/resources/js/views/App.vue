<template>
  <div>
    <NavBar/>
    <router-view></router-view>
  </div>
</template>

<script>
  import NavBar from "../components/NavBar"
export default {
  name:"App",

  components:{
    NavBar
  },
}
</script>
<style>
*{
  margin:0px;
  padding:0px;
}

</style>