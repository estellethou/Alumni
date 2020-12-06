import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import axios from 'axios'
import VueSweetalert2 from 'vue-sweetalert2';

import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyDndDaolrwHtlPleRoqYH2b0KUGSkKukCs",
  }
});

require('@/store/modules/subscriber')

// axios.defaults.baseURL = 'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api'
axios.defaults.baseURL = 'https://coding-academy-alumni.herokuapp.com/api'

Vue.config.productionTip = false
Vue.use(VueSweetalert2);

store.dispatch('attempt', localStorage.getItem('token')).then(() =>{
  new Vue({
    router,
    store,
    vuetify,
    render: h => h(App)
  }).$mount('#app')
})


