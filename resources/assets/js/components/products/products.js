import { mapActions, mapGetters } from 'vuex'

export default {
  components: {},
  props: [],
  data () {
    return {
      //
    }
  },
  computed: {
      ...mapGetters('products', {
          products: 'products',
          isLoadingProducts: 'isLoadingProducts'
      })
  },
  methods: {
      ...mapActions('products', {
          getProducts: 'getProducts'
      })
  },
  mounted() {
    this.getProducts()
  }
}
