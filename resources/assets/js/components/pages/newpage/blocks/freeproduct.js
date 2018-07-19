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
                product: null
            },
        }
    },
    watch: {
        'params.product': function () {
            this.$emit('input', this.prepareEmitedData())
        },
    },
    methods: {
        getProducts() {
            axios.get('/webapi/products/all').then((res) => {
                this.options.products = res.data.data

                if (!this.params.product && this.product) {
                    const selectedProduct = _.find(this.options.products, ['id', this.product.productId])
                    this.params.product = { ...selectedProduct }
                }
            })
        },
        prepareEmitedData() {
            return {
                productId: this.params.product ? this.params.product.id : null
            }
        }
    },
    mounted() {
        this.getProducts();
    }
}