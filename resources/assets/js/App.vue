<template>
    <div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <router-link class="navbar-brand" to="/">Home</router-link>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                       <li v-if="!auth.api_token"><router-link to="/register" >Register</router-link></li>
                       <li v-if="!auth.api_token"><router-link to="/login">Login</router-link></li>
                       <li v-if="auth.api_token">
                            <a @click.stop="logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <router-view></router-view>
    </div>
</template>
<script type="text/javascript">
    import Auth from './helpers/auth'
    import {post} from './helpers/api'

    export default{
        created(){
            Auth.initialize()
        },
        data(){
            return{
                auth: Auth.state
            }
        },
        methods:{
            logout(){
                post('api/logout').then((res) =>{
                    if(res.data.done){
                        Auth.remove()
                        Flash.setSuccess('You have successfully logged out!')
                        this.$router.push('/login')
                    }
                });
            }
        }
    }
</script>
