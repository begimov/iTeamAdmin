import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: ['editedTestId'],
  data () {
    return {
      isShowingBlocksPanel: false,
    }
  },
  computed: {
      ...mapGetters('tests/newtest', [
          'testname',
          'testdesc',
      //     'blocks',
      //     'layout',
      //     'categoryOptions',
      //     'categoryParams',
      //     'themeOptions',
      //     'themeParams',
      //     'isLoading',
      //     'errors'
      ]),
      'testName': {
        get () {
          return this.testname
        },
        set (value) {
          this.updateTestName(value)
        }
      },
      'testDesc': {
        get () {
          return this.testdesc
        },
        set (value) {
          this.updateTestDesc(value)
        }
      },
  },
  methods: {
      ...mapActions('tests/newtest', [
          'getInitialData',
          'updateTestName',
          'updateTestDesc',
      //     'updateCategoryParams',
      //     'updateThemeParams',
      //     'addBlockToLayout',
      //     'moveElementUp',
      //     'moveElementDown',
      //     'deleteElement',
          'save',
      //     'resetState',
      //     'setPageToEdit',
      //     'update'
      ]),
      // findBlock (id) {
      //   return _.find(this.blocks, ['id',id])
      // },
      cancel () {
        // this.resetState()
        this.$emit('cancelNewTest')
      }
  },
  mounted() {
    this.getInitialData().then(res => {
    //   if (this.editedPageId) {
    //     this.setPageToEdit(this.editedPageId)
    //   }
    })
  }
}
