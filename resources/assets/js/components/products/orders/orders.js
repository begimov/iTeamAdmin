export default {
  data () {
    return {
      orders: [],
      meta: null,
      flags: {
        neworder: false
      },
      sortingFlags: {
        latest: 1,
        largestIds: 0
      },

    }
  },
  methods: {

    getOrders (page) {
      axios.get('/webapi/orders?page=' + page, {
        params:{
          sortingFlags: this.sortingFlags
        }
      }).then((response) => {
        this.orders = response.data.data
        this.meta = response.data.meta
      })
    },

    applyFilter (filterName) {
      this.sortingFlags = _.mapValues(this.sortingFlags, (value, flagName) => {
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
