<template>
  <div class="event">
       <Header/> 
    <h1>
      EVENT PAGE IN PROGRESS
    </h1>
    <AddEvent></AddEvent>
  </div>
</template>

<script>
import Header from "./../components/Header"
import AddEvent from "./../components/EventComponents/AddEvent"

export default {
  name: "Event",
  components: {
    Header,
    AddEvent,
  },
  data() {
    return {};
  },

  methods: {
  },

  computed: {
  },

};
</script>

<style>

</style>
