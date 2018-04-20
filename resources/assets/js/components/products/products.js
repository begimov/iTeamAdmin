import { mapActions, mapGetters } from 'vuex'

export default {
  components: {},
  props: [],
  data () {
    return {
      timer: 0,
    }
  },
  computed: {
      ...mapGetters('products', [
          'currentModule',
          'products',
          'meta',
          'isLoading'
      ]),
      'searchQuery': {
        get () {
          return this.getSearchQuery
        },
        set (value) {
          this.updateSearchQuery(value)
        }
      },
  },
  methods: {
      ...mapActions('products', [
          'getProducts',
          'updateSearchQuery',
          'setCurrentModule',
      ]),
      textSearch () {
        clearTimeout(this.timer);
        this.timer = setTimeout(function(){
            this.getProducts()
        }.bind(this), 1000)
      },
  },
  mounted() {
    this.getProducts()
  }
}
