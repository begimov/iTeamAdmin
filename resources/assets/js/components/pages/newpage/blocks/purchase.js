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
                priceTag: null
              },
        }
    },
    watch: {
        'params.product': function (product) {
            this.$emit('input', {
                productId: product ? product.id : null,
                pricetagId: null
            })
            this.params.priceTag = null;
        },
        'params.priceTag': function (priceTag) {
            this.$emit('input', {
                productId: this.params.product.id,
                pricetagId: priceTag ? priceTag.id : null
            })
        }
    },
    methods: {
        getProducts() {
            axios.get('/webapi/products/all').then((res) => {
                console.log(res)
            })
        }
    },
    mounted() {
        this.getProducts();
    }
}