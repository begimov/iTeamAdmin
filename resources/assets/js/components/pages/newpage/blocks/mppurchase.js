import Multiselect from 'vue-multiselect'

export default {
    props: ['products'],
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
            isLoaded: false
        }
    },
    watch: {
        //
    },
    methods: {
        getProducts() {
            //
        },
        prepareEmitedData() {
            //
        }
    },
    mounted() {
        this.getProducts();
    }
}