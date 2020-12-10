import Vue from 'vue'
import Vuex from 'vuex'
import Comments from "./modules/comments"
import Jobs from './modules/jobs'
import Posts from "./modules/posts"
import Profiles from "./modules/profiles"
import Auth from "./modules/auth"
import Users from "./modules/users"
import UserProfiles from "./modules/userprofiles"
import Events from "./modules/events"
import UserJob from './modules/userjob'
import createPersistedState from "vuex-persistedstate"


Vue.use(Vuex)

export default new Vuex.Store({
  plugins: [createPersistedState()],
  modules:{
    Comments,
    Posts, 
    Jobs,
    Profiles,
    Auth,
    Users,
    UserProfiles,
    Events,
    UserJob
  }
})
