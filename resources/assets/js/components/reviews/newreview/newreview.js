import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  // props: ['editedTestId'],
  computed: {
      ...mapGetters('reviews/newreview', [
          'author',
          'position',
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
      'authorPosition': {
        get () {
          return this.position
        },
        set (value) {
          this.updatePosition(value)
        }
      }
  },
  methods: {
      ...mapActions('reviews/newreview', [
          'updateAuthor',
          'updatePosition',
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
