<template>
    <div>
        <form  method="POST">
            <input type="hidden" name="stripeToken" v-model="stripeToken">
            <input type="hidden" name="stripeEmail" v-model="stripeEmail">

            <select name="product" v-model="product">

                <option v-for="product in products" :value="product.id">{{product.name}} &ndash; ${{product.price / 100}}</option>

            </select>

            <button type="submit" @click.prevent="buy">Buy</button>
        </form>
        </div>
</template>

<script>
    export default {

        props:
         ['products'],

        data(){
            return {
              stripeEmail:'',
                stripeToken:'',
                product:1
            }
        },

        mounted() {

        },

        created(){
           this.stripe=StripeCheckout.configure({
                key:"pk_test_XM7zhfrciIebS9b6u544ZCl6",
                image:"https://stripe.com/img/documentation/checkout/marketplace.png",
                locale:"auto",
                token: (token) => {

                    this.stripeToken  = token.id;
                    this.stripeEmail = token.email;

                   axios.post('/purchases', this.$data)
                            .then(response => {
                        // JSON responses are automatically parsed.
                        alert('Complete! Thanks for your payment');
                })
                    .catch(e => {
                       // this.errors.push(e)
                })


                }
            });

        },

        methods:{
            buy(){

                let product = this.findProductById(this.product);

                this.stripe.open({
                    name: product.name,
                    description:product.description,
                    amount: product.price,
                    locale:"auto",
                    currency:'cad'
                });
            },

            findProductById(id){
                return this.products.find(product => product.id==id);
            }
        }
    }
</script>
