import Multiselect from 'vue-multiselect'

export default {
    props: ['products'],
    components: { Multiselect },
    data () {
        return {
            params: {
                products: []
            }
        }
    },
    methods: {
        addProduct() {
            this.params.products.push({})
        }
    },
    watch: {
        'params.products': {
            handler: function (products) {
                this.$emit('input', products);
            },
            deep: true
        },
        products: {
            handler: function(products) {
                if (!this.params.products.length) {
                    this.params.products = products
                }
            }
        }
    },
    mounted() {
        //
    }
}