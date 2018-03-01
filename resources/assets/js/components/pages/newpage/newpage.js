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
  },
  methods: {
      ...mapActions('pages/newpage', [
          'updatePageName',
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
