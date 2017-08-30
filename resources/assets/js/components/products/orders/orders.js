export default {
  data () {
    return {
      orders: [],
      meta: null,
      flags: {
        neworder: false
      },
      filters: {
        id: true
      }
    }
  },
  methods: {
    getOrders (page) {
      axios.get('/webapi/orders?page=' + page).then((response) => {
        this.orders = response.data.data
        this.meta = response.data.meta
      })
    },
    setIdFilter () {
      this.filters.id = !this.filters.id
      if (this.filters.id) {
        this.orders.sort(function(a, b) {
          return a.id - b.id;
        })
      } else {
        this.orders.sort(function(a, b) {
          return b.id - a.id;
        })
      }
    }
  },
  computed: {
    //
  },
  mounted() {
    this.getOrders(1)
  }
}
