export default {
  props: ['initData'],
  data () {
    return {
      params: {
        orderBy: this.initData
      }
    }
  },
  methods: {
    applyOrder (orderBy) {
      this.params.orderBy = _.mapValues(this.params.orderBy, (value, flagName) => {
        if (flagName == orderBy) {
          return (value == 'desc') ? 'asc' : 'desc'
          }
        return ''
      })
      this.$emit('input', this.params.orderBy)
    },
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
