import { createRouter, createWebHistory } from 'vue-router'
import Offers from '../views/Offers.vue'

const routes = [
  {
    path: '/',
    name: 'Offers',
    component: Offers
  },
  {
    path: '/demands',
    name: 'demands',
    component: () => import('../views/Demands.vue')
  },
  {
    path: '/auth',
    name: 'auth',
    component: () => import('../views/auth.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
