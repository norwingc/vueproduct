<template>
    <div class="container" @submit.prevent="login">
        <form class="form">
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="Email" v-model="form.email">
                <small class="form__error" v-if="error.email">{{ error.email[0]  }}</small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" v-model="form.password">
                <small class="form__error" v-if="error.password">{{ error.password[0]  }}</small>
            </div>
            <button class="btn btn-primary" :disabled="isProcessing">Submit</button>
        </form>
    </div>
</template>

<script type="text/javascript">
    import {post} from '../../helpers/api'
    import Auth from '../../helpers/auth'
    export default{
        data(){
            return{
                form: {
                    email: '',
                    password: ''
                },
                error:{},
                isProcessing: false
            }
        },
        methods:{
            login(){
                this.isProcessing = true
                this.error = {}
                post('/api/login', this.form).then((res) => {
                   if(res.data.authenticated){
                        Auth.set(res.data.api_token, res.data.user_id)
                        this.$router.push('/')
                   }
                }).catch((err) =>{
                    this.error        = err.response.data.errors
                    this.isProcessing = false
                })
            }
        }
    }
</script>
