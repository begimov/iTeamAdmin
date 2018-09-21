import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  // props: ['editedTestId'],
  computed: {
      ...mapGetters('reviews/newreview', [
          'reviewAuthor',
          // 'errors'
      ]),
      // 'reviewAuthor': {
      //   get () {
      //     return this.reviewAuthor
      //   },
      //   set (value) {
      //     this.updateReviewAuthor(value)
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
      //     'updateReviewAuthor',
      //     'setPageToEdit',
      //     'update'
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
