<template>
    <div class="container" @submit.prevent="save">
        <h3 class="text-center">Add Product</h3>

        <form class="form">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Category Name" v-model="category.name">
                <small class="form__error" v-if="error.name">{{ error.name[0]  }}</small>
            </div>
            <button class="btn btn-primary" :disabled="isProcessing">Submit</button>
        </form>
    </div>

</template>

<script>

    import {post} from '../../helpers/api'

    export default{
        data(){
            return{
                category: {
                    name: ''
                },
                error: {},
                isProcessing: false
            }
        },
        methods:{
            save(){
                this.isProcessing = true
                this.error = {}
                post('/api/category', this.category).then((res)=>{
                    if(res.data.saved){
                        alert('Category Created');
                        this.category.name = ''
                        this.isProcessing = false
                    }
                }).catch((err)=>{
                    this.error        = err.response.data.errors
                    this.isProcessing = false
                })
            }
        }
    }
</script>
