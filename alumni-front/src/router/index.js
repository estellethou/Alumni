import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Job from '../views/Job.vue'
import JobEdit from '../views/JobEdit.vue'
import Forum from "../views/Forum.vue"
import DetailsPost from "../views/DetailsPost"
import Profile from '../views/Profile.vue'
import Login from '../views/Login.vue'
import Dashboard from '../views/Dashboard.vue'
import RecruterForm from "../views/RecruterForm"
import PaymentForm from "../views/PaymentForm"
import store from '../store'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/recruter',
    name: 'RecruterForm',
    component: RecruterForm
  },
  {
    path: '/recruter/payment',
    name: 'PaymentForm',
    component: PaymentForm
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
    path: '/profile',
    name: 'Profile',
    component: Profile,
  },
  {
    path: '/signin',
    name: 'Login',
    component: Login
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
    beforeEnter: (to, from, next) => {
      // console.log(store.getters['authenticated'])
      // console.log(next)
      if (!store.getters['authenticated']){
        return next({
          name:'Login'
        })
      }
      next()
      }
    },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
