<template>
  <div data-app class="add">
    <v-row justify="center">
      <v-dialog v-model="dialog" persistent max-width="600px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn depressed class="btn-modal" v-bind="attrs" v-on="on">
            Add Event
          </v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">Add Event</span>
          </v-card-title>
          <v-form class="container">
            <div class="form-row">
              <div class="form-group col-md-6">
                <!-- TITLE -->
                <v-text-field
                  v-model="title"
                  label="Event Title"
                  :rules="[rules.required]"
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
                ></v-text-field>
              </div>
              <!-- ATTENDEES -->
              <div class="form-group col-md-4">
                <label for="url-perso">Attendees</label>
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
              ></textarea>
            </div>
            <!-- START DATE -->
            <!-- <div class="form-row"> -->
              <div class="form-group col-md-4">
                <label for="Start Date">Start Date</label>
                <input :rules="[rules.required]" type="date" v-model="start_date" />
              </div>
              <!-- END DATE  -->
              <div class="form-group col-md-4">
                <label for="End date">End date</label>
                <input :rules="[rules.required]" type="date" v-model="end_date" />
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
          <v-btn color="blue darken-1" text @click="close">
            Close
          </v-btn>
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
  name: "AddEvent",
  data(){
      return{
          dialog:false,
          valid: true,
          title:'',
          image:'',
          location:'',
          description:'',
          start_date:'',
          end_date:'',
          attendees:'',

        rules: {
        required: (value) => !!value || "Required.",
      },
      }
  },
  methods: {
    ...mapActions(["addEvent"]),
    close(e){
        e.preventDefault();
        this.dialog = false;
        this.title='';
        this.image='';
        this.location='';
        this.description='';
        this.start_date='';
        this.end_date='';
        this.attendees='';
    },
    saveForm(e){
      e.preventDefault();
      if (this.attendees !== ''){
        var newEvent = {
            organiser_user_id : this.user.id,
            title : this.title,
            description: this.description,
            location : this.location,
            start_date: this.start_date,
            end_date: this.end_date,
            max_attendees : this.attendees,
        }
      }else{
          newEvent = {
            organiser_user_id : this.user.id,
            title : this.title,
            description: this.description,
            location : this.location,
            start_date: this.start_date,
            end_date: this.end_date,
        }
      }
        this.addEvent(newEvent)
          .then(() => {
            this.dialog = false;
            this.$swal({
              title: "Event created",
              icon: "success",
              confirmButtonText: "Ok",
            });
            this.title='';
            this.image='';
            this.location='';
            this.description='';
            this.start_date='';
            this.end_date='';
            this.attendees='';
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