import Vue from 'vue'
import Vuex from 'vuex'
import Comments from "./modules/comments"
import Jobs from './modules/jobs'


Vue.use(Vuex)

export default new Vuex.Store({
  modules:{
    Comments,
    Jobs,
  }
})
