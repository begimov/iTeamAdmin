export default {
  data () {
    return {
      orders: [],
      meta: null,
      flags: {
        neworder: false
      },
      filterFlags: {
        lastIds: false,
        latest: true
      }
    }
  },
  methods: {
    getOrders (page) {
      axios.get('/webapi/orders?page=' + page, {
        params:{
          filterFlags: this.filterFlags
        }
      }).then((response) => {
        this.orders = response.data.data
        this.meta = response.data.meta
      })
    },
    switchFilter (filterName) {
      this.filterFlags[filterName] = !this.filterFlags[filterName]
    }
  },
  computed: {
    //
  },
  mounted() {
    this.getOrders(1)
  }
}
