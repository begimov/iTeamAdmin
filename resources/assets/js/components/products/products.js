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
      ...mapGetters('products', [
          'products',
          'meta',
          'isLoading'
      ])
  },
  methods: {
      ...mapActions('products', [
          'getProducts',
      ])
  },
  mounted() {
    this.getProducts()
  }
}
