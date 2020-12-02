import Vue from 'vue'
import Vuex from 'vuex'
import Comments from "./modules/comments"
import Jobs from './modules/jobs'
import Posts from "./modules/posts"
import Profiles from "./modules/profiles"
import Users from "./modules/users"



Vue.use(Vuex)

export default new Vuex.Store({
  modules:{
    Comments,
    Jobs,
    Posts,
    Profiles,
    Users
  }
})
