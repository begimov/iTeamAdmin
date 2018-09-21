import { mapActions, mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters('reviews', [
            'currentModule',
            'isLoading',
            'reviews',
            'getSearchQuery',
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
        ]),
        textSearch () {
            clearTimeout(this.timer);
            this.timer = setTimeout(function(){
                this.getReviews()
            }.bind(this), 1000)
        },
    },
    mounted () {
        this.getReviews()
    }
}