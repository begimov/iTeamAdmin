import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  computed: {
      ...mapGetters('pages', [
          'currentModule',
          'pages',
          'meta',
          'isLoading',
          'getSearchQuery',
          'editedPageId',
          'categoryOptions',
          'getCategoryParams'
      ]),
      'searchQuery': {
        get () {
          return this.getSearchQuery
        },
        set (value) {
          this.updateSearchQuery(value)
        }
      },
      'categoryParams': {
        get () {
          return this.getCategoryParams
        },
        set (category) {
          this.updateCategoryParams(category)
        }
      }
  },
  methods: {
      ...mapActions('pages', [
          'getPages',
          'updateSearchQuery',
          'setCurrentModule',
          'setEditedPageId',
          'updateCategoryParams',
      ]),
      textSearch () {
        clearTimeout(this.timer);
        this.timer = setTimeout(function(){
            this.getPages()
        }.bind(this), 1000)
      },
      cancelNewPage() {
        this.setEditedPageId(null)
        this.setCurrentModule('pages')
        this.getPages()
      }
  },
  mounted() {
    this.getPages()
  }
}
