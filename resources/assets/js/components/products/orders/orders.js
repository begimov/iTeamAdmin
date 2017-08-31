export default {
  data () {
    return {
      orders: [],
      meta: null,
      flags: {
        neworder: false
      },
      params: {
        orderBy: {
          latest: 1,
          largestIds: 0
        },
        filters: {
          //
        }
      },

    }
  },
  methods: {

    getOrders (page) {
      axios.get('/webapi/orders?page=' + page, {
        params: {
          params: this.params
        }
      }).then((response) => {
        this.orders = response.data.data
        this.meta = response.data.meta
      })
    },

    applyOrder (orderBy) {
      this.params.orderBy = _.mapValues(this.params.orderBy, (value, flagName) => {
        if (flagName == orderBy) {
          return (value == 0) ? 1 : -value
          }
        return 0
      })
      this.getOrders(this.meta.pagination.current_page)
    }

  },
  computed: {
    //
  },
  mounted() {
    this.getOrders(1)
  }
}
