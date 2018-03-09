import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from '../views/auth/login.vue'
import Register from '../views/auth/register.vue'
import ProductIndex from '../views/product/index.vue'
import ProductShow from '../views/product/show.vue'
import ProductCreate from '../views/product/create.vue'
import CategoryCreate from '../views/category/create.vue'

Vue.use(VueRouter)

const router =  new VueRouter({
    routes: [
        {path: '/', component: ProductIndex},
        {path: '/login', component: Login},
        {path: '/register', component: Register},
        {path: '/product/show/:id', component: ProductShow},
        {path: '/product/create', component: ProductCreate},
        {path: '/category/create', component: CategoryCreate},
    ]
})

export default router
