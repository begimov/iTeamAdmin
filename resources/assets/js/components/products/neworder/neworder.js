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
        users: []
      },
      order: {
        product: null,
        paymentType: null,
        paymentState: null,
        price: null,
        user: null
      },
      isLoading: false,
      errors: {}
    }
  },
  methods: {
    // New order creation
    saveOrder () {
      axios.post(`/webapi/orders`, this.processData()).then((response) => {
        this.$emit('orderSaved')
        this.cancelOrder()
      }).catch((error) => {
        this.errors = error.response.data
      })
    },
    processData() {
      return {
        product_id: this.order.product ? this.order.product.id : null,
        payment_type_id: this.order.paymentType ? this.order.paymentType.id : null,
        payment_state_id: this.order.paymentState ? this.order.paymentState.id : null,
        price: this.order.price,
        user_id: this.order.user ? this.order.user.id : null
      }
    },
    getEmails (query) {
      this.isLoading = true

      axios.get(`/webapi/users/email?query=${query}`).then((response) => {
        this.options.users = response.data.data
        this.isLoading = false;
      })
    },

    // Existing order editing
    setOrderToEdit() {
      this.isLoading = true
      axios.get(`/webapi/orders/${this.editedOrderId}/edit`).then((response) => {
        const responseData = response.data.data

        this.order = {
          product: responseData.product.data,
          paymentType: responseData.paymentType.data,
          paymentState: responseData.paymentState.data,
          price: responseData.price,
          user: responseData.user.data
        }

        this.isLoading = false;
      })
    },

    // Misc
    cancelOrder () {
      this.$emit('cancelOrder')
    },
  },
  mounted() {
    this.isLoading = true
    axios.get('/webapi/orders/create').then((response) => {

      this.options.products = response.data.products.data
      this.options.paymentTypes = response.data.paymentTypes.data
      this.options.paymentStates = response.data.paymentStates.data

      this.isLoading = false;

      if (this.editedOrderId) {
        this.setOrderToEdit()
      }
    })
  }
}
