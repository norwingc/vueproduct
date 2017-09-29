<template>
    <div class="container">{{ product }}</div>
</template>

<script type="text/javascript">
    import {get} from '../../helpers/api'

    export default{
        data(){
            return{
                product: null
            }
        },
        created(){
            get(`/api/product/${this.$route.params.id}`).then((res)=>{
                this.product = res.data
            })
        }
    }
</script>
