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
                data: {
                    title: '',
                    description: ''
                },
                product: null,
                priceTag: null,
                isBundle: false
            },
            isLoaded: false
        }
    },
    watch: {
        'params.product': function () {
            this.$emit('input', this.prepareEmitedData())
            this.params.priceTag = this.isLoaded ? null : this.params.priceTag;
            this.isLoaded = true
        },
        'params.priceTag': function () {
            this.$emit('input', this.prepareEmitedData())
        },
        'params.isBundle': function () {
            this.$emit('input', this.prepareEmitedData())
        },
        'params.data': {
            handler: function () {
                this.$emit('input', this.prepareEmitedData())
            },
            deep: true
        }
    },
    methods: {
        getProducts() {
            axios.get('/webapi/products/all').then((res) => {
                this.options.products = res.data.data

                if (!this.params.product && !this.params.priceTag && this.product && this.product.productId) {
                    const selectedProduct = _.find(this.options.products, ['id', this.product.productId])
                    this.params.product = { ...selectedProduct }

                    const selectedPriceTag = _.find(selectedProduct.priceTags.data, ['id', this.product.pricetagId])
                    this.params.priceTag = (selectedPriceTag) ? {...selectedPriceTag} : null

                    this.params.isBundle = this.product.isBundle
                    this.params.data = this.product.data ? this.product.data : this.params.data
                }
            })
        },
        prepareEmitedData() {
            return {
                data: this.params.data,
                productId: this.params.product ? this.params.product.id : null,
                pricetagId: this.params.priceTag ? this.params.priceTag.id : null,
                isBundle: this.params.isBundle
            }
        }
    },
    mounted() {
        this.getProducts();
    }
}