<template>
    <div>
        <div>
            <gmap-map
            :center="center"
            :zoom="12"
            style="width:100%;  height: 400px;" 
            >
            <gmap-marker
                :key="index"
                v-for="(m, index) in markers"
                :position="m.position"
                @click="center=m.position"
            ></gmap-marker>
            </gmap-map>
        </div>
        <div>{{ markers }}</div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import axios from 'axios';

export default {
    name: "GoogleMap",
    
    data() {
        return {
            // default to Paris
            center: { lat: 48.866667, lng: 2.333333 },
            markers: [{position: { lat:48.866667, lng:2.333333}}],
        };
    },

    mounted() {
        this.geolocate();
    },

    created() {
        this.fetchAllJobs();
        this.geocode();
    },

    methods: {

        ...mapActions(["fetchAllJobs"]),
        // receives a place object via the autocomplete component
        
        geolocate() {
            navigator.geolocation.getCurrentPosition(position => {
                this.center = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
                };
            });
        },

        geocode() {
            this.getAllJobs.forEach(job => {
                const fullAddress = [];
                fullAddress.push(job.street_address, job.city, job.postal_code);
                const strFullAddress = fullAddress.toString();

                // axios.get or fetch
                axios.get('https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/geocode/json',
                    {
                        params: {
                            address: strFullAddress,
                            key: 'AIzaSyCcQF8GcEbw96HCPndWKyX9fjgIk1N38M0'
                        }
                    })
                .then(response => {
                    // if(response.data.results.length !== 0 && Array.isArray(response.data.results)) {
                    console.log(response.data)
                        const addressCoord = response.data.results[0].geometry.location;
                        const marker = { position: addressCoord };
                        console.log(marker);
                        this.markers.push(marker);
                    // }
                })
                .catch(error => {
                    console.log(error)
                })
            })
        },
    },

    computed: {
        ...mapGetters(["getAllJobs", "user"]),
    }
};
</script>