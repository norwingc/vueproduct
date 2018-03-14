<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Stok</th>
                    <th>Descipcion</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products">
                    <td>{{ product.name }}</td>
                    <td>{{ product.stock }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.category.name }}</td>
                    <td>
                        <router-link class="btn btn-info" :to="`/product/${product.id}`">Show</router-link>
                        <button class="btn btn-danger" @click="remove(product)" v-if="authState.api_token && authState.user_id === product.user_id">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script type="text/javascript">
    import {get, del} from '../../helpers/api'
    import Auth from '../../helpers/auth'

    export default{
        data(){
            return{
                products: {},
                authState: Auth.state
            }
        },
        created(){
           this.getProducts()
        },
        methods:{
            remove(product){
                del('api/product/'+product.id).then((res) =>{
                    this.getProducts()
                });
            },
            getProducts(){
                 get('api/product').then((res) =>{
                    this.products = res.data.products
                });
            }
        }
    }
</script>
