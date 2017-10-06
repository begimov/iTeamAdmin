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
          'blocks',
          'layout',
          'isLoading'
      ]),
  },
  methods: {
      ...mapActions('pages/newpage', [
          'getAvailableBlocks',
          'addBlockToLayout',
      ]),
      findBlock (id) {
        return _.find(this.blocks, ['id',id])
      }
  },
  mounted() {
    this.getAvailableBlocks()
  }
}
