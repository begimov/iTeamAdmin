import { mapActions, mapGetters } from 'vuex'

export default {
    methods: {
        ...mapActions('reviews', [
            'getReviews',
        ])
    },
    mounted () {
        this.getReviews()
    }
}