import { mapActions, mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters('reviews', [
            'isLoading',
            'reviews',
        ])
    },
    methods: {
        ...mapActions('reviews', [
            'getReviews',
        ])
    },
    mounted () {
        this.getReviews()
    }
}