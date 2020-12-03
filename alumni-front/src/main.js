import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import axios from 'axios'

require('@/store/modules/subscriber')

axios.defaults.baseURL = 'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api'

Vue.config.productionTip = false

store.dispatch('attempt', localStorage.getItem('token'))

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount('#app')
