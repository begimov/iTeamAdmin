import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  data () {
    return {
      orders: [],
      meta: null,
      timer: 0,
      filters: {
        paymentType: {
          options: [
            {id: 1, name: 'Я.Деньги'},
            {id: 1, name: 'Карта'},
            {id: 1, name: 'Сбербанк'},
            {id: 1, name: 'Перевод'},
          ]
        }
      },
      flags: {
        neworder: false
      },
      params: {
        orderBy: {
          latest: 1,
          largestIds: 0
        },
        filters: {
          textSearch: '',
          paymentType: [],
        }
      }
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
    },

    textSearch () {
      clearTimeout(this.timer);
      this.timer = setTimeout(function(){
          this.getOrders(1)
      }.bind(this), 2000)
    },

  },
  computed: {
    //
  },
  mounted() {
    this.getOrders(1)
  }
}
