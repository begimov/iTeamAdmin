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
      ...mapGetters('pages', [
          'currentModule',
          'pages',
          'meta',
          'isLoading',
          'getSearchQuery',
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
      ...mapActions('pages', [
          'getPages',
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
    this.getPages()
  }
}
