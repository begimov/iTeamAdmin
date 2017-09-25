export default {
  data () {
    return {
      query: '',
    }
  },
  methods: {
    changed () {
      this.$emit('input', this.query)
    },
    applyOrder (orderBy) {
      this.params.orderBy = _.mapValues(this.params.orderBy, (value, flagName) => {
        if (flagName == orderBy) {
          return (value == 'desc') ? 'asc' : 'desc'
          }
        return ''
      })
      this.getOrders(this.meta.pagination.current_page)
    },
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
