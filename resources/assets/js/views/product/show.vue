<template>
    <div class="container">
        <h2 class="titul">{{ product.name }}</h2>
        <p><b>Description: </b> <small>{{ product.description }}</small></p>
        <p><b>Stock:</b> <small>{{ product.stock }}</small></p>
        <p><b>Category:</b> <small>{{ product.category.name }}</small></p>
        <div v-if="authState.api_token && authState.user_id === product.user_id">
            <button class="btn btn-info">Edit</button>
            <button class="btn btn-danger" @click="remove(product)">Delete</button>
        </div>
    </div>
</template>

<script type="text/javascript">
    import {get, del, put} from '../../helpers/api'
    import Auth from '../../helpers/auth'

    export default{
        data(){
            return{
                product: {
                    name: '',
                    description: '',
                    stock: 0,
                    category:{}
                },
                authState: Auth.state
            }
        },
        created(){
          this.getProduct()
        },
        methods:{
            getProduct(){
                get(`/api/product/${this.$route.params.id}`).then((res)=>{
                    this.product = res.data
                })
            },
            remove(product){
                del('api/product/'+product.id).then((res)=>{
                      this.$router.push('/')
                })
            }
        }
    }
</script>
