import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router =  new VueRouter({
    routes: [
        {path: '/', component: require('../views/product/index.vue')},
        {path: '/login', component: require('../views/auth/login.vue')},
        {path: '/register', component: require('../views/auth/register.vue')},
        {path: '/product/create', component: require('../views/product/create.vue')},
        {path: '/product/:id', component: require('../views/product/show.vue')},
        {path: '/category/create', component: require('../views/category/create.vue')},
    ]
})

export default router
