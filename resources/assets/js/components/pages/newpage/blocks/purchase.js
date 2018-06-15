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
                pricetagId: null,
                isBundle: this.params.isBundle
            })
            this.params.priceTag = null;
        },
        'params.priceTag': function (priceTag) {
            this.$emit('input', {
                productId: this.params.product.id,
                pricetagId: priceTag ? priceTag.id : null,
                isBundle: this.params.isBundle
            })
        },
        'params.isBundle': function () {
            this.$emit('input', {
                productId: this.params.product ? this.params.product.id : null,
                pricetagId: this.params.priceTag ? this.params.priceTag.id : null,
                isBundle: this.params.isBundle
            })
        },
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