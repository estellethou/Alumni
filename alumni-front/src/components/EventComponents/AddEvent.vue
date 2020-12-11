<template>
  <div data-app class="add">
    <v-row justify="start" class="ml-2 my-3">
      <v-dialog v-model="dialog" max-width="600px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn class="btn-modal white--text" color="green" v-bind="attrs" v-on="on">
            <v-icon>{{ 'mdi-plus' }}</v-icon>Add Event
          </v-btn>
        </template>
        <v-card class="pa-4">
          <v-card-title>
            <span class="headline mx-auto">Add Event</span>
          </v-card-title>
          <v-form class="container pb-0" v-model="valid" lazy-validation>
            <div class="form-row">
              <div class="form-group col-md-6 mb-0 py-1">
                <!-- TITLE -->
                <v-text-field
                  v-model="title"
                  label="Event Title"
                  :rules="[rules.required]"
                  required
                  clearable
                ></v-text-field>
              </div>
              <div class="form-group col-md-6 mb-0 py-1">
                <v-text-field
                  v-model="location"
                  label="Event Location"
                  :rules="[rules.required]"
                  required
                  clearable
                ></v-text-field>
              </div>
            </div>
            <!-- LOCATION -->
            <div class="form-row">
              <!-- ATTENDEES -->
              <div class="form-group col-md-6 py-1">
                <v-text-field
                  v-model="attendees"
                  type="number"
                  label="Max Attendees"
                  required
                  clearable
                ></v-text-field>
              </div>
            </div>
            <!-- START DATE -->
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="Start Date">Start Date</label>
                <input
                  required
                  :rules="[rules.required]"
                  type="datetime-local"
                  v-model="start_date"
                />
              </div>
              <!-- END DATE  -->
              <div class="form-group col-md-6">
                <label for="End date">End date</label>
                <input required :rules="[rules.required]" type="datetime-local" v-model="end_date" />
              </div>
            </div>
            <!-- DESCRIPTION -->
            <div class="form-group">
              <label for="description">Description</label>
              <textarea
                type="text"
                class="form-control"
                v-model="description"
                placeholder="Tell us what you are planning here"
                :rules="[rules.required]"
                required
              ></textarea>
            </div>
            <!-- <div class="form-row"> -->
            <!-- IMAGE -->
            <!-- <div class="form-group col-md-6">
                <label for="image">Select your Event image</label>
                <input
                  type="file"
                  class="form-control"
                  id="image"
                  accept="image/png, image/jpeg"
                />
            </div>-->
          </v-form>
          <v-spacer></v-spacer>
          <v-btn :disabled="!valid" color="success" @click="saveForm" class="ml-3">Save</v-btn>
          <v-btn color="blue darken-1" text @click="close">Close</v-btn>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "AddEvent",
  data() {
    return {
      dialog: false,
      valid: true,
      title: "",
      image: "",
      location: "",
      description: "",
      start_date: "",
      end_date: "",
      attendees: "",

      rules: {
        required: (value) => !!value || "Required.",
      },
    };
  },
  methods: {
    ...mapActions(["addEvent"]),
    close(e) {
      e.preventDefault();
      this.dialog = false;
      this.title = "";
      this.image = "";
      this.location = "";
      this.description = "";
      this.start_date = "";
      this.end_date = "";
      this.attendees = "";
    },
    saveForm(e) {
      e.preventDefault();
      if (this.attendees !== "") {
        var newEvent = {
          organiser_user_id: this.user.id,
          title: this.title,
          description: this.description,
          location: this.location,
          start_date: this.start_date,
          end_date: this.end_date,
          max_attendees: this.attendees,
        };
      } else {
        newEvent = {
          organiser_user_id: this.user.id,
          title: this.title,
          description: this.description,
          location: this.location,
          start_date: this.start_date,
          end_date: this.end_date,
        };
      }
      console.log(newEvent);
      this.dialog = false;
      this.addEvent(newEvent)
        .then(() => {
          this.$swal({
            title: "Event created",
            icon: "success",
            confirmButtonText: "Ok",
          });
          this.title = "";
          this.image = "";
          this.location = "";
          this.description = "";
          this.start_date = "";
          this.end_date = "";
          this.attendees = "";
        })
        .catch(() => {
          this.$swal({
            title: "Event Error!",
            text: "Please check the form",
            icon: "error",
            confirmButtonText: "Retry",
          });
        });
    },
  },
  computed: {
    ...mapGetters(["getAllEvents", "authenticated", "user"]),
  },
};
</script>

<style scoped>
</style>