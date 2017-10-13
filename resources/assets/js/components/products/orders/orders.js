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
    getOrders (page = 1) {
      this.flags.isLoading = true;
      axios.get('/webapi/orders?page=' + page, {
        params: {
          ...this.params.orderBy,
          paymentType: _.map(this.params.filters.paymentType, 'id'),
          paymentState: _.map(this.params.filters.paymentState, 'id'),
          searchQuery: this.params.searchQuery.trim()
        }
      }).then((response) => {
        this.orders = response.data.data
        this.meta = response.data.meta
        this.flags.isLoading = false;
      })
    },

    textSearch () {
      clearTimeout(this.timer);
      this.timer = setTimeout(function(){
          this.getOrders(1)
      }.bind(this), 1000)
    },
  },
  watch: {
    'params.orderBy': function () {
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
