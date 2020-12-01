import Vue from 'vue'
import Vuex from 'vuex'
import Comments from "./modules/comments"

Vue.use(Vuex)

export default new Vuex.Store({
  modules:{
    Comments
  }
})
