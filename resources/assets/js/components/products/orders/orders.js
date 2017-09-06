import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: ['paymentTypes','paymentStates'],
  data () {
    return {
      orders: [],
      meta: null,
      timer: 0,
      flags: {
        neworder: false,
        isLoading: false
      },
      params: {
        orderBy: {
          created_at: 'desc',
          id: ''
        },
        filters: {
          paymentType: [],
          paymentState: [],
        },
        searchQuery: '',
      }
    }
  },
  methods: {

    getOrders (page) {
      this.flags.isLoading = true;
      axios.get('/webapi/orders?page=' + page, {
        params: {
          params: {
            orderBy: this.params.orderBy,
            filters: {
              payment_type_id: _.map(this.params.filters.paymentType, 'id'),
              payment_state_id: _.map(this.params.filters.paymentState, 'id'),
            },
            searchQuery: this.params.searchQuery.trim()
          }
        }
      }).then((response) => {
        this.orders = response.data.data
        this.meta = response.data.meta
        this.flags.isLoading = false;
      })
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

    textSearch () {
      clearTimeout(this.timer);
      this.timer = setTimeout(function(){
          this.getOrders(1)
      }.bind(this), 1000)
    },

  },
  computed: {
    //
  },
  mounted() {
    this.getOrders(1)
  }
}
