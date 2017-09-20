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
      ...mapGetters([
          'products',
          'isLoadingProducts'
      ])
  },
  methods: {
      ...mapActions([
          'getProducts'
      ])
  },
  mounted() {
    this.getProducts()
  }
}
