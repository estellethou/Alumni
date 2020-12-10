<template>
  <div class="event">
       <Header/> 
    <AddEvent></AddEvent>
    <EventList></EventList>
  </div>
</template>

<script>
import Header from "./../components/Header"
import AddEvent from "./../components/EventComponents/AddEvent"
import EventList from "./../components/EventComponents/EventList"

export default {
  components: {
    Header,
    AddEvent,
    EventList
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
