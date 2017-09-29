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
                    <td>{{ product.descroption }}</td>
                    <td>{{ product.category.name }}</td>
                    <td>
                        <router-link class="btn btn-info" :to="`/product/${product.id}`">Show</router-link>
                        <button class="btn btn-danger" @click="remove(product)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script type="text/javascript">
    import {get} from '../../helpers/api'

    export default{
        data(){
            return{
                products: {}
            }
        },
        created(){
           this.getProducts()
        },
        methods:{
            remove(product){
                alert('remove: '+ product.id);
            },
            getProducts(){
                 get('api/product').then((res) =>{
                    this.products = res.data.products
                });
            }
        }
    }
</script>
