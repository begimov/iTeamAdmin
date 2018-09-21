import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  // props: ['editedTestId'],
  computed: {
      ...mapGetters('reviews/newreview', [
          'author',
          // 'errors'
      ]),
      'reviewAuthor': {
        get () {
          return this.author
        },
        set (value) {
          this.updateAuthor(value)
        }
      },
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
      ...mapActions('reviews/newreview', [
          'updateAuthor',
      //     'setPageToEdit',
      //     'update'
      ]),
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
