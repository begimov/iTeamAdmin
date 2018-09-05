import { mapActions, mapGetters } from 'vuex'

export default {
  computed: {
      ...mapGetters('tests', [
          'currentModule',
          'tests',
          'meta',
          'isLoading',
          'getSearchQuery',
          'editedTestId'
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
      ...mapActions('tests', [
          'getTests',
          'updateSearchQuery',
          'setCurrentModule',
          // 'setEditedPageId'
      ]),
      textSearch () {
        clearTimeout(this.timer);
        this.timer = setTimeout(function(){
            this.getTests()
        }.bind(this), 1000)
      },
      cancelNewTest() {
        // this.setEditedPageId(null)
        this.setCurrentModule('tests')
      }
  },
  mounted() {
    this.getTests()
  }
}
