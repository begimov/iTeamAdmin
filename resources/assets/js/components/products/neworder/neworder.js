import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: ['editedOrderId'],
  data () {
    return {
      options: {
        products: [],
        paymentTypes: [],
        paymentStates: [],
        emails: []
      },
      params: {
        product_id: null,
        payment_type_id: null,
        payment_state_id: null,
        price: null,
        user_id: null
      },
      isLoading: false,
      errors: {}
    }
  },
  methods: {
    saveOrder () {
      axios.post(`/webapi/orders`, _.mapValues(this.params, (param, key) => {
        return (key !== 'price') ? param.id : param
      })).then((response) => {
        this.$emit('orderSaved')
        this.$emit('cancelOrder')
      }).catch((error) => {
        this.errors = error.response.data
      })
    },
    cancelOrder () {
      this.$emit('cancelOrder')
    },
    getEmails (query) {
      this.isLoading = true
      axios.get(`/webapi/users/email?query=${query}`).then((response) => {
        this.options.emails = response.data.data
        this.isLoading = false;
      })
    },
    setOrderToEdit() {
      this.isLoading = true
      axios.get(`/webapi/orders/${this.editedOrderId}/edit`).then((response) => {
        console.log(response.data.data)
        this.isLoading = false;
      })
    }
  },
  mounted() {
    this.isLoading = true
    axios.get('/webapi/orders/create').then((response) => {
      this.options.products = response.data.products.data
      this.options.paymentTypes = response.data.paymentTypes.data
      this.options.paymentStates = response.data.paymentStates.data
      this.isLoading = false;
    })
    if (this.editedOrderId) {
      this.setOrderToEdit()
    }
  }
}
