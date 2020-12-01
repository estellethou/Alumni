require('./bootstrap');
window.Vue = require('vue');
import App from './views/App.vue';
import store from "./store"
import router from './router/index'

Vue.config.productionTip = false

new Vue({
  components: {
    App
  },
  router,
  store,
  render: h => h(App)
}).$mount('#app')
