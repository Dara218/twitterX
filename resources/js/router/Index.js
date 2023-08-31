import { createRouter, createWebHistory } from "vue-router"
import Index from '../vue-files/Index.vue'
import Home from '../vue-files/home/Home.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'Index',
            component: Index
        },
        {
            path: '/home',
            name: 'Home',
            component: Home
        }
    ]
})

export default router
