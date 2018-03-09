<template>
    <div class="container" @submit.prevent="save">
        <h3 class="text-center">Add Product</h3>

        <form class="form">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Full Name" v-model="product.name">
                <small class="form__error" v-if="error.name">{{ error.name[0]  }}</small>
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" class="form-control" placeholder="Stock" v-model="product.stock">
                <small class="form__error" v-if="error.stock">{{ error.name[0]  }}</small>
            </div>
             <div class="form-group">
                <label>Desciption</label>
                <textarea class="form-control" placeholder="Desciption" v-model="product.description"></textarea>
                <small class="form__error" v-if="error.description">{{ error.name[0]  }}</small>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select v-model="product.category_id" class="form-control" >
                    <option value="0">Chose one</option>
                    <option v-for="(category, index) in categories" :value="category.id">{{ category.name }}</option>
                </select>
            </div>
            <button class="btn btn-primary" :disabled="isProcessing">Submit</button>
        </form>
    </div>
</template>

<script>
    import {get, post} from '../../helpers/api.js'

    export default{
        data(){
            return{
                product : {
                    name: '',
                    stock: 0,
                    description: '',
                    category_id: 0
                },
                categories: {},
                error:{},
                isProcessing: false
            }
        },
        created(){
            this.getCategories()
        },
        methods: {
            save(){
                this.isProcessing = true
                this.error = {}
                post('api/product', this.product).then((res)=>{
                    if(res.data.saved == true){
                        this.$router.push('/Product/show/'+res.data.product.id)
                    }
                }).catch((err) =>{
                    this.error        = err.response.data.errors
                    this.isProcessing = false
                })
            },
            getCategories(){
                get('api/category').then((res) =>{
                    this.categories = res.data.categories
                });
            }
        }
    }
</script>
