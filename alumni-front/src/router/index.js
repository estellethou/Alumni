import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Profile from '../views/Profile.vue'
import SignIn from '../views/SignIn.vue'
import Dashboard from '../views/Dashboard.vue'
import store from '../store'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },

  {
    path: '/profile',
    name: 'Profile',
    component: Profile
  },

  {
    path: '/signin',
    name: 'SignIn',
    component: SignIn
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
          name:'SignIn'
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
