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
                campaignToken: null,
                noPhone: false
            },
        }
    },
    watch: {
        'params': {
            'handler': function () {
                this.$emit('input', this.prepareEmitedData())
            },
            deep: true
        },
    },
    methods: {
        getProducts() {
            axios.get('/webapi/products/free').then((res) => {
                this.options.products = res.data.data

                if (!this.params.product && this.product) {
                    const selectedProduct = _.find(this.options.products, ['id', this.product.productId])
                    this.params.product = { ...selectedProduct }

                    this.params.campaignToken = this.product.campaignToken
                    this.params.noPhone = this.product.noPhone ? this.product.noPhone : false
                }
            })
        },
        prepareEmitedData() {
            return {
                productId: this.params.product ? this.params.product.id : null,
                campaignToken: this.params.campaignToken,
                noPhone: this.params.noPhone
            }
        }
    },
    mounted() {
        this.getProducts();
    }
}