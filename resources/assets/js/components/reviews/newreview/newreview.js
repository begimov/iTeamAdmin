import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: ['editedReviewId'],
  computed: {
      ...mapGetters('reviews/newreview', [
          'author',
          'position',
          'quote',
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
      },
      'reviewQuote': {
        get () {
          return this.quote
        },
        set (value) {
          this.updateQuote(value)
        }
      }
  },
  methods: {
      ...mapActions('reviews/newreview', [
          'updateAuthor',
          'updatePosition',
          'updateQuote',
          'save',
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
