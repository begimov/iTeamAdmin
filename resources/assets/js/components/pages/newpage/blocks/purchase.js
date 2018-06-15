import Multiselect from 'vue-multiselect'

export default {
    props: ['product'],
    components: { Multiselect },
    data () {
        return {
            options: {
                products: [],
              },
            params: {
                product: null,
                priceTag: null,
                isBundle: false
            },
        }
    },
    watch: {
        'params.product': function (product) {
            this.$emit('input', {
                productId: product ? product.id : null,
                pricetagId: null
            })
            // this.params.priceTag = null;
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
                this.options.products = res.data.data

                if (!this.params.product && !this.params.priceTag && this.product) {
                    const selectedProduct = _.find(this.options.products, ['id', this.product.productId])
                    this.params.product = { ...selectedProduct }

                    this.params.priceTag = {
                        ..._.find(selectedProduct.priceTags.data, ['id', this.product.pricetagId])
                    }
                }
            })
        }
    },
    mounted() {
        this.getProducts();
    }
}