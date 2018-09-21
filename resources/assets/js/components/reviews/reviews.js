import { mapActions, mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters('reviews', [
            'isLoading',
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