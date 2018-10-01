import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: ['editedTestId'],
  computed: {
      ...mapGetters('tests/newtest', [
          'testname',
          'testdesc',
          'typeOptions',
          'typeParams',
          'isLoading',
          'questions',
          'conditions',
          'certificate',
          'totalScore',
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
      'testCertificate': {
        get () {
          return this.certificate
        },
        set (value) {
          this.updateCertificate(value)
        }
      }
  },
  methods: {
      ...mapActions('tests/newtest', [
          'getInitialData',
          'updateTestName',
          'updateTestDesc',
          'updateCertificate',
          'updateTypeParams',
          'save',
          'resetState',
          'addQuestion',
          'addCondition',
          'removeQuestion',
      //     'setPageToEdit',
      //     'update'
      ]),
      cancel () {
        this.resetState()
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
