<template>
  <div data-app class="add">
    <v-row justify="center">
      <v-dialog v-model="dialog" persistent max-width="600px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn depressed class="btn-modal" v-bind="attrs" v-on="on">
            Edit Event
          </v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">Edit Event</span>
          </v-card-title>
          <v-form class="container" v-model="valid" lazy-validation>
            <div class="form-row">
              <div class="form-group col-md-6">
                <!-- TITLE -->
                <v-text-field
                  v-model="title"
                  label="Event Title"
                  :rules="[rules.required]"
                  required
                ></v-text-field>
              </div>
            </div>
            <!-- LOCATION -->
            <div class="form-row">
              <div class="form-group col-md-6">
                <v-text-field
                  v-model="location"
                  label="Location"
                  :rules="[rules.required]"
                  required
                ></v-text-field>
              </div>
              <!-- ATTENDEES -->
              <div class="form-group col-md-4">
                <label for="attendees">Max Attendees</label>
                <input type="number" class="form-control" v-model="attendees" />
              </div>
            </div>
            <!-- DESCRIPTION -->
            <div class="form-group">
              <label for="description">Description</label>
              <textarea
                type="text"
                class="form-control"
                v-model="description"
                placeholder="Please enter the Event description"
                :rules="[rules.required]"
                required
              ></textarea>
            </div>
            <!-- START DATE -->
            <!-- <div class="form-row"> -->
            <div class="form-group col-md-4">
              <label for="Start Date">Start Date</label>
              <input
                required
                :rules="[rules.required]"
                type="datetime-local"
                v-model="start_date"
              />
            </div>
            <!-- END DATE  -->
            <div class="form-group col-md-4">
              <label for="End date">End date</label>
              <input
                required
                :rules="[rules.required]"
                type="datetime-local"
                v-model="end_date"
              />
            </div>
            <!-- IMAGE -->
            <!-- <div class="form-group col-md-6">
                <label for="image">Select your Event image</label>
                <input
                  type="file"
                  class="form-control"
                  id="image"
                  accept="image/png, image/jpeg"
                />
            </div> -->
          </v-form>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="close"> Close </v-btn>
          <v-btn :disabled="!valid" color="success" @click="saveForm">
            Save
          </v-btn>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "EditEvent",
  props: ["event"],
  data() {
    return {
      dialog: false,
      valid: true,
      id : this.event.id,
      title: this.event.title,
      location: this.event.location,
      description: this.event.description,
      start_date: this.formatDate(this.event.start_date),
      end_date: this.formatDate(this.event.end_date),
      attendees: this.event.max_attendees,
      rules: {
        required: (value) => !!value || "Required.",
      },
    };
  },
  methods: {
    ...mapActions(["editEvent"]),
    close(e) {
      e.preventDefault();
      this.dialog = false;
    },
    formatDate(date){
      var debut_date = date.slice(0,10)
      var heure = date.slice(11,19)
      return (debut_date + "T" + heure)
  },
    saveForm(e) {
      e.preventDefault();
        var newEvent = {
            id: this.event.id,
            organiser_user_id: this.event.organiser_user_id,  
            title: this.title,
            description: this.description,
            location: this.location,
            start_date: this.start_date,
            end_date: this.end_date,
            max_attendees: this.attendees,
        }
      this.dialog = false;
      this.editEvent(newEvent)
        .then(() => {
          this.$swal({
            title: "Event modified",
            icon: "success",
            confirmButtonText: "Ok",
          })
        })
        .catch(() => {
          this.$swal({
            title: "Event Error!",
            text: "Please check the form",
            icon: "error",
            confirmButtonText: "Retry",
          });
        });
    }
    },
  computed: {
    ...mapGetters(["getAllEvents", "authenticated", "user"]),
  },
  
};


</script>

<style scoped>
</style>