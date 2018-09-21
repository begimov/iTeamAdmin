import { mapActions, mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters('reviews', [
            'currentModule',
            'isLoading',
            'reviews',
            'getSearchQuery',
            'meta',
        ]),
        'searchQuery': {
          get () {
            return this.getSearchQuery
          },
          set (value) {
            this.updateSearchQuery(value)
          }
        },
    },
    methods: {
        ...mapActions('reviews', [
            'getReviews',
            'updateSearchQuery',
            'setCurrentModule',
        ]),
        textSearch () {
            clearTimeout(this.timer);
            this.timer = setTimeout(function(){
                this.getReviews()
            }.bind(this), 1000)
        },
        cancelNewReview() {
          // this.setEditedPageId(null)
          this.setCurrentModule('reviews')
        }
    },
    mounted () {
        this.getReviews()
    }
}