<template>
  <div class="d-flex flex-wrap">
    <div v-for="event in getAllEvents" :key="event.id">
      <event-card :event="event" :user="user" v-if="new Date(event.start_date) >= Date.now()"></event-card>
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
    ...mapGetters(["getAllEvents", "user"]),
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