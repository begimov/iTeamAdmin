import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['editedReviewId'],
  computed: {
      ...mapGetters('reviews/newreview', [
          'isLoading',
          'author',
          'position',
          'quote',
          'avatar',
          'errors'
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
      },
      'reviewAvatar': {
        get () {
          return this.avatar
        },
        set (value) {
          this.updateAvatar(value)
        }
      }
  },
  methods: {
      ...mapActions('reviews/newreview', [
          'updateAuthor',
          'updatePosition',
          'updateQuote',
          'updateAvatar',
          'save',
          'resetState',
      //     'setPageToEdit',
      //     'update'
      ]),
      cancel () {
        this.resetState()
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
