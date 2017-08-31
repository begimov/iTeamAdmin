export default {
  data () {
    return {
      orders: [],
      meta: null,
      flags: {
        neworder: false
      },
      orderBy: {
        latest: 1,
        largestIds: 0
      },

    }
  },
  methods: {

    getOrders (page) {
      axios.get('/webapi/orders?page=' + page, {
        params:{
          orderBy: this.orderBy
        }
      }).then((response) => {
        this.orders = response.data.data
        this.meta = response.data.meta
      })
    },

    applyFilter (filterName) {
      this.orderBy = _.mapValues(this.orderBy, (value, flagName) => {
        if (flagName == filterName) {
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
