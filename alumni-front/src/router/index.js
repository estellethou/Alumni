import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Job from '../views/Job.vue'
import JobEdit from '../views/JobEdit.vue'
import Forum from "../views/Forum.vue"
import DetailsPost from "../views/DetailsPost"
import Profile from '../views/Profile.vue'
import OtherProfile from '../views/OtherProfile.vue'
import Login from '../views/Login.vue'
//import Dashboard from '../views/Dashboard.vue'
import RecruterForm from "../views/RecruterForm"
import ResetPassword from '../views/ResetPassword.vue'
import Directory from '../views/Directory.vue'
import store from '../store'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    beforeEnter: (to, from, next) => {
      if (!store.getters['authenticated']){
        return next({
          name:'Login'
        })
      }
      next()
      }
  },
  {
    path: '/recruter',
    name: 'RecruterForm',
    component: RecruterForm
  },

  {
    path: '/job',
    name: 'Job',
    component: Job
  },

  {
    // path: '/job/edit/:id/:jobData',
    path: '/job/edit/:id',
    name: 'JobEdit',
    component: JobEdit,
    props: true,
  },

  {
    path: '/resetpassword',
    name: 'ResetPassword',
    component: ResetPassword
  },
  
  {
    path: '/forum',
    name: 'Forum',
    component: Forum
  },

  {
    path: '/post/:id',
    name: 'DetailPost',
    component: DetailsPost,
    props:true,
  },

  {
    path: '/profile', //profile of user connected 
    name: 'Profile',
    component: Profile,
  },
  {
    path: '/directory',
    name: 'Directory',
    component: Directory,
  },
  {
    path: '/profile/:profileId/:userId',
    name: 'OtherProfile',
    component: OtherProfile,
    props: true

  },
  {
    path: '/signin',
    name: 'Login',
    component: Login
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
