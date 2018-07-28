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
            this.params.products.push({isBundle:false, pricetagId:null,productId:1})
        }
    },
    watch: {
        'params.products': {
            handler: function (products) {
                this.$emit('input', products);
            },
            deep: true
        },
    },
    mounted() {
        //
    }
}