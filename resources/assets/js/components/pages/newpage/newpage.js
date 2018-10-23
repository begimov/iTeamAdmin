import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: ['editedPageId'],
  data () {
    return {
      isShowingBlocksPanel: false,
    }
  },
  computed: {
      ...mapGetters('pages/newpage', [
          'pagename',
          'pagedesc',
          'blocks',
          'layout',
          'categoryOptions',
          'categoryParams',
          'themeOptions',
          'themeParams',
          'isLoading',
          'errors'
      ]),
      'pageName': {
        get () {
          return this.pagename
        },
        set (value) {
          this.updatePageName(value)
        }
      },
      'pageDesc': {
        get () {
          return this.pagedesc
        },
        set (value) {
          this.updatePageDesc(value)
        }
      },
  },
  methods: {
      ...mapActions('pages/newpage', [
          'getInitialData',
          'updatePageName',
          'updatePageDesc',
          'updateCategoryParams',
          'updateThemeParams',
          'addBlockToLayout',
          'moveElementUp',
          'moveElementDown',
          'deleteElement',
          'copyExistingElement',
          'save',
          'resetState',
          'setPageToEdit',
          'update'
      ]),
      findBlock (id) {
        return _.find(this.blocks, ['id',id])
      },
      cancel () {
        this.resetState()
        this.$emit('cancelNewPage')
      },
      copyElement(id) {
        this.copyExistingElement(id)
        this.$nextTick(() => {
            console.log(this.$store.state)
        })
    }
  },
  mounted() {
    this.getInitialData().then(res => {
      if (this.editedPageId) {
        this.setPageToEdit(this.editedPageId)
      }
    })
  }
}
