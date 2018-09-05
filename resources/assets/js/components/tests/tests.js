import { mapActions, mapGetters } from 'vuex'

export default {
  computed: {
      ...mapGetters('tests', [
          // 'currentModule',
          // 'pages',
          // 'meta',
          'isLoading',
          // 'getSearchQuery',
          // 'editedPageId'
      ]),
      // 'searchQuery': {
      //   get () {
      //     return this.getSearchQuery
      //   },
      //   set (value) {
      //     this.updateSearchQuery(value)
      //   }
      // },
  },
  methods: {
      ...mapActions('tests', [
          'getTests',
          // 'updateSearchQuery',
          // 'setCurrentModule',
          // 'setEditedPageId'
      ]),
      // textSearch () {
      //   clearTimeout(this.timer);
      //   this.timer = setTimeout(function(){
      //       this.getPages()
      //   }.bind(this), 1000)
      // },
      // cancelNewPage() {
      //   this.setEditedPageId(null)
      //   this.setCurrentModule('pages')
      // }
  },
  mounted() {
    this.getTests()
  }
}
