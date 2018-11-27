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
                title: '',
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
                    this.params.title = this.product.title ? this.product.title : ''
                }
            })
        },
        prepareEmitedData() {
            return {
                productId: this.params.product ? this.params.product.id : null,
                campaignToken: this.params.campaignToken,
                noPhone: this.params.noPhone,
                title: this.params.title
            }
        }
    },
    mounted() {
        this.getProducts();
    }
}