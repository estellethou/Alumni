require('./bootstrap');
window.Vue = require('vue');
import App from './views/App.vue';
import store from "./store"
import router from './router'


Vue.config.productionTip = false

new Vue({
  components: {
    App
  },
  store,
  router,
  render: h => h(App)
}).$mount('#app')
