<template>
  <v-card class="mx-auto" max-width="344">
    <v-img src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" height="200px"></v-img>
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <v-card-title>{{ event.title }}</v-card-title>
        <v-card-subtitle class="d-flex flex-column">
          <div>{{ new Date(event.start_date).toLocaleString() }}</div>
          <div class="green--text text--darken-1">{{ event.location }}</div>
        </v-card-subtitle>
      </div>
      <v-btn
        class="mr-4 white--text pl-2"
        :color="attending ? 'green' : 'blue'"
        @click="attendEvent"
      >
        <v-icon>{{ attending ? 'mdi-check' : 'mdi-plus' }}</v-icon>
        {{ attending ? 'Attending' : 'Attend' }}
      </v-btn>
      
    </div>
    <div v-if="user.id == event.organiser_user_id">
      <EditEvent :event="event"></EditEvent>
    </div>
    <v-card-actions>
      <v-btn color="orange lighten-1" text>See details</v-btn>

      <v-spacer></v-spacer>

      <v-btn icon @click="show = !show">
        <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
      </v-btn>
    </v-card-actions>

    <v-expand-transition>
      <div v-show="show">
        <v-divider></v-divider>

        <v-card-text>{{ event.description }}</v-card-text>
        <v-divider></v-divider>
        <v-card-text>
          <strong>Attending this event:</strong>
          {{ participantCount }}
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>
</template>

<script>
import EditEvent from '@/components/EventComponents/EditEvent'

export default {
  name: "EventCard",
  props: ["event", "user"],
  components:{
    EditEvent,
  },
  data: () => ({
    show: false,
    attending: false,
    participantCount: Math.floor(Math.random() * 3 + 1),
  }),
  methods: {
    attendEvent: function () {
      this.attending = !this.attending;
      if(this.attending){
        this.participantCount++;
      }
      else {
        this.participantCount--;
      }
    },
  },
};
</script>

<style>
</style>