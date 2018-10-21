import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: {
    categories: {
      required: true,
      type: Array
    }
  },
  computed: {
      ...mapGetters('pages', [
          'currentModule',
          'pages',
          'meta',
          'isLoading',
          'getSearchQuery',
          'editedPageId',
          'categoriesOptions',
          'getCategoriesParams',
          'themesOptions',
          'getThemesParams'
      ]),
      'searchQuery': {
        get () {
          return this.getSearchQuery
        },
        set (value) {
          this.updateSearchQuery(value)
        }
      },
      'categoriesParams': {
        get () {
          return this.getCategoriesParams
        },
        set (category) {
          this.updateCategoriesParams(category)
        }
      },
      'themesParams': {
        get () {
          return this.getThemesParams
        },
        set (category) {
          this.updateThemesParams(category)
        }
      },
  },
  methods: {
      ...mapActions('pages', [
          'getPages',
          'updateSearchQuery',
          'setCurrentModule',
          'setEditedPageId',
          'updateCategoriesParams',
          'updateThemesParams'
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
    this.$store.state.pages.options.categories = this.categories
  }
}
