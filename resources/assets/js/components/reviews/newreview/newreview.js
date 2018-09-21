import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  // props: ['editedTestId'],
  computed: {
      // ...mapGetters('tests/newtest', [
      //     'testname',
      //     'testdesc',
      //     'typeOptions',
      //     'typeParams',
      //     'isLoading',
      //     'questions',
      //     'conditions',
      //     'totalScore',
      // //     'errors'
      // ]),
      // 'testName': {
      //   get () {
      //     return this.testname
      //   },
      //   set (value) {
      //     this.updateTestName(value)
      //   }
      // },
      // 'testDesc': {
      //   get () {
      //     return this.testdesc
      //   },
      //   set (value) {
      //     this.updateTestDesc(value)
      //   }
      // }
  },
  methods: {
      // ...mapActions('tests/newtest', [
      //     'getInitialData',
      //     'updateTestName',
      //     'updateTestDesc',
      //     'updateTypeParams',
      //     'save',
      //     'resetState',
      //     'addQuestion',
      //     'addCondition',
      //     'removeQuestion',
      // //     'setPageToEdit',
      // //     'update'
      // ]),
      cancel () {
        // this.resetState()
        this.$emit('cancelNewReview')
      }
  },
  mounted() {
    // this.getInitialData().then(res => {
    //   if (this.editedPageId) {
    //     this.setPageToEdit(this.editedPageId)
    //   }
    // })
  }
}
