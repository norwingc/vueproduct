import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from '../views/auth/login.vue'
import Register from '../views/auth/register.vue'
import ProductIndex from '../views/product/index.vue'
import ProductShow from '../views/product/show.vue'

Vue.use(VueRouter)

const router =  new VueRouter({
    routes: [
        {path: '/', component: ProductIndex},
        {path: '/login', component: Login},
        {path: '/register', component: Register},
        {path: '/product/:id', component: ProductShow}
    ]
})

export default router
