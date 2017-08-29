export default {
  props: ['ordersProp'],
  data () {
    return {
      orders: this.ordersProp,
      filters: {
        id: true
      }
    }
  },
  methods: {
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
    //
  }
}
