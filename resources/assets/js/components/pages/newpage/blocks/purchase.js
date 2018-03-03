import Multiselect from 'vue-multiselect'

export default {
    components: { Multiselect },
    data () {
        return {
            options: {
                products: [
                    { id: 1, name: 'Product 1' },
                    { id: 2, name: 'Product 2' },
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