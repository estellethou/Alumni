import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Job from "../views/Job.vue";
import JobEdit from "../views/JobEdit.vue";
import Forum from "../views/Forum.vue";
import DetailsPost from "../views/DetailsPost";
import Profile from "../views/Profile.vue";
import OtherProfile from "../views/OtherProfile.vue";
import Login from "../views/Login.vue";
import SingleJob from "../views/SingleJob.vue";
import About from "../views/About";
//import Dashboard from '../views/Dashboard.vue'


import RecruterForm from "../views/RecruterForm"
import ResetPassword from '../views/ResetPassword.vue'
import Directory from '../views/Directory.vue'
import Event from '../views/Event.vue'
import store from '../store'
import SingleJobRecruter from "../views/SingleJobRecruter"

Vue.use(VueRouter)

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
  {
    path: "/recruter",
    name: "RecruterForm",
    component: RecruterForm,
  },
  {

    path: '/recruter/newjob/:job',
    name: 'SingleJobRecruter',
    component: SingleJobRecruter,
    props:true
  },
  {
    path: '/job/:id',
    name: 'SingleJob',
    component: SingleJob,
    props: true,
    // USED TO PROTECT ROUTE
    beforeEnter: (to, from, next) => {
      if (!store.getters["authenticated"]) {
        return next({
          name: "Login",
        });
      }
      next();
    },
  },
  {
    path: '/job',
    name: 'Job',
    component: Job,
    // USED TO PROTECT ROUTE
    beforeEnter: (to, from, next) => {
      if (!store.getters["authenticated"]) {
        return next({
          name: "Login",
        });
      }
      next();
    },
  },

  {
    // path: '/job/edit/:id/:jobData',
    path: "/job/edit/:id",
    name: "JobEdit",
    component: JobEdit,
    beforeEnter: (to, from, next) => {
      if (!store.getters["authenticated"]) {
        return next({
          name: "Login",
        });
      }
      next();
    },
    props: true,
  },

  {
    path: "/resetpassword",
    name: "ResetPassword",
    component: ResetPassword,
  },

  {
    path: "/forum",
    name: "Forum",
    component: Forum,
    beforeEnter: (to, from, next) => {
      if (!store.getters["authenticated"]) {
        return next({
          name: "Login",
        });
      }
      next();
    },
  },

  {
    path: "/post/:id",
    name: "DetailPost",
    component: DetailsPost,
    props: true,
    beforeEnter: (to, from, next) => {
      if (!store.getters["authenticated"]) {
        return next({
          name: "Login",
        });
      }
      next();
    },
  },

  {
    path: "/profile", //profile of user connected
    name: "Profile",
    component: Profile,
    beforeEnter: (to, from, next) => {
      if (!store.getters["authenticated"]) {
        return next({
          name: "Login",
        });
      }
      next();
    },
  },
  {
    path: "/directory",
    name: "Directory",
    component: Directory,
    beforeEnter: (to, from, next) => {
      if (!store.getters["authenticated"]) {
        return next({
          name: "Login",
        });
      }
      next();
    },
  },
  {
    path: "/profile/:profileId/:userId",
    name: "OtherProfile",
    component: OtherProfile,
    props: true,
    beforeEnter: (to, from, next) => {
      if (!store.getters["authenticated"]) {
        return next({
          name: "Login",
        });
      }
      next();
    },
  },
  {
    path: "/signin",
    name: "Login",
    component: Login,
  },
  {
    path: "/event",
    name: "Event",
    component: Event,
    beforeEnter: (to, from, next) => {
      if (!store.getters["authenticated"]) {
        return next({
          name: "Login",
        });
      }
      next();
    },
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
