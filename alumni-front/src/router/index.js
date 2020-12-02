import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Job from '../views/Job.vue'
import Forum from "../views/Forum.vue"
import DetailsPost from "../views/DetailsPost"
import Profile from '../views/Profile.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },

  {
    path: '/job',
    name: 'Job',
    component: Job
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
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
