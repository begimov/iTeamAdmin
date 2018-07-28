import Multiselect from 'vue-multiselect'

export default {
    props: ['products'],
    components: { Multiselect },
    data () {
        return {
            params: {
                products: [
                    {isBundle:false, pricetagId:null,productId:1},
                    {isBundle:false, pricetagId:1,productId:2}
                ]
            },
            isLoaded: false
        }
    },
    watch: {
        //
    },
    methods: {
        //
    },
    mounted() {
        //
    }
}