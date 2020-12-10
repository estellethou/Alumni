<template>
  <div class="d-flex flex-wrap container">
    <div class="ma-2" v-for="event in getAllEvents" :key="event.id">
      <event-card :event="event"></event-card>
    </div>
  </div>
</template>

<script>
import EventCard from "../EventComponents/EventCard.vue";
import { mapActions, mapGetters } from "vuex";

export default {
  components: {
    EventCard,
  },
  name: "EventList",
  computed: {
    ...mapGetters(["getAllEvents"]),
  },
  methods: {
    ...mapActions(["setAllEvents"]),
  },
  created() {
    this.setAllEvents();
  },
};
</script>

<style>
</style>