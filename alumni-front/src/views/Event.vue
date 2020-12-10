<template>
  <div class="event">
    <Header />
    <div class="d-flex flex-column container">
      <AddEvent></AddEvent>
      <EventList></EventList>
    </div>
  </div>
</template>

<script>
import Header from "./../components/Header";
import AddEvent from "./../components/EventComponents/AddEvent";
import EventList from "./../components/EventComponents/EventList";

export default {
  components: {
    Header,
    AddEvent,
    EventList,
  },
  data() {
    return {};
  },

  methods: {},

  computed: {},
};
</script>

<style>
</style>
