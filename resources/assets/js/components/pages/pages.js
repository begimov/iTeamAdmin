import { mapActions, mapGetters } from 'vuex'

export default {
  computed: {
      ...mapGetters('pages', [
          'currentModule',
          'pages',
          'meta',
          'isLoading',
          'getSearchQuery',
          'editedPageId'
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
          'setEditedPageId'
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
