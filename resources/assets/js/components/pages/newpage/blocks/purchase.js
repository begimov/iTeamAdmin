import Multiselect from 'vue-multiselect'

export default {
    components: { Multiselect },
    data () {
        return {
            options: {
                products: [],
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
                this.options.products = res.data.data
            })
        }
    },
    mounted() {
        this.getProducts();
    }
}