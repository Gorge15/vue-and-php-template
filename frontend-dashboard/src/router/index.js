import { createRouter, createWebHashHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Dashboard from "../views/Dashboard.vue";
const routes = [
  {
    path: '/',
    component: Home
  },
  {
    path: '/dashboard',
    component: Dashboard
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
