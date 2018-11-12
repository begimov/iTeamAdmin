import { mapActions, mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters('reports', [
            'isLoading'
        ])
    },
    methods: {
        ...mapActions('reports', [
            'getReports'
        ])
    },
    mounted () {
        this.getReports()
    }
}