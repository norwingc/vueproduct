<template>
    <div id="app">
        <app-nav></app-nav>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>
<script type="text/javascript">
    import AppNav from './views/templates/Nav.vue'

    export default{
        components:{
            'app-nav' : AppNav
        }
    }
</script>
