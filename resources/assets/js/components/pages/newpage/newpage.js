import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: [],
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
          'isLoading'
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
          'addBlockToLayout',
          'moveElementUp',
          'moveElementDown',
          'deleteElement',
          'save',
      ]),
      findBlock (id) {
        return _.find(this.blocks, ['id',id])
      },
      cancel () {
        this.$emit('cancelNewPage')
      }
  },
  mounted() {
    this.getInitialData()
  }
}
