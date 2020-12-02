import Vue from 'vue'
import Vuex from 'vuex'
import Comments from "./modules/comments"
import Posts from "./modules/posts"

Vue.use(Vuex)

export default new Vuex.Store({
  modules:{
    Comments,
    Posts 
  }
})
