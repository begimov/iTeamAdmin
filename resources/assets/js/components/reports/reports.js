import { mapActions, mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters('reviews', [
            //
        ])
    },
    methods: {
        ...mapActions('reviews', [
            //
        ])
    },
    mounted () {
        // this.getReviews()
        console.log('dsfsdf')
    }
}