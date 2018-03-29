import { mapActions, mapGetters } from 'vuex'

export default {
  components: {},
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
          'updatePageName',
          'updatePageDesc',
          'getAvailableBlocks',
          'addBlockToLayout',
          'deleteElement',
          'save',
      ]),
      findBlock (id) {
        return _.find(this.blocks, ['id',id])
      }
  },
  mounted() {
    this.getAvailableBlocks()
  }
}
