<template>
    <div class="container" @submit.prevent="register">
        <form class="form">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" v-model="form.name">
                <small class="form__error" v-if="error.name">{{ error.name[0]  }}</small>
            </div>
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
            <div class="form-group">
                <label>Password Confirmation</label>
                <input type="password" class="form-control" placeholder="Password" v-model="form.password_confirmation">
            </div>
            <button class="btn btn-primary" :disabled="isProcessing">Submit</button>
        </form>
    </div>
</template>

<script type="text/javascript">
    import {post} from '../../helpers/api'
    export default{
        data(){
            return{
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                error:{},
                isProcessing: false
            }
        },
        methods:{
            register(){
                this.isProcessing = true
                this.error = {}
                post('/api/register', this.form).then((res) => {
                   if(res.data.registered){
                        this.$router.push('/login')
                   }
                }).catch((err) =>{
                    this.error        = err.response.data.errors
                    this.isProcessing = false
                })
            }
        }
    }
</script>
