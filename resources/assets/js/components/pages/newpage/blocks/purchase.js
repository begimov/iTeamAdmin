import Multiselect from 'vue-multiselect'

export default {
    components: { Multiselect },
    data () {
        return {
            options: {
                products: [
                    { id: 1, name: 'Product 1', priceTags: 
                        [
                            { id: 1, price: 100 },
                            { id: 2, price: 200 }
                        ]
                    },
                    { id: 2, name: 'Product 2', priceTags: 
                        [
                            { id: 3, price: 300 },
                            { id: 4, price: 400 }
                        ]
                    },
                ],
              },
              params: {
                product: null,
              },
        }
    },
    watch: {
        'params.product': function (product) {
            console.log(product)
            this.$emit('input', {
                productId: product.id
                // pricetagId: 2
            })
        }
    },
    mounted() {
        //
    }
}