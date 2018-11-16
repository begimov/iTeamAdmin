import { mapActions, mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters('reports', [
            'isLoading',
            'dailyReport',
            'weeklyReport',
            'monthlyReport'
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