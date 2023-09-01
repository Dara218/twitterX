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
            component: Home,
            beforeEnter: function(to, from, next){
                axios.get('/api/authenticated-user')
                .then(() => next())
                .catch(() => next({name: 'Index'}))
            }
        },
    ]
})

export default router
