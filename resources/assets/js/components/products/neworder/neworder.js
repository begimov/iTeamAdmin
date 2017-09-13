import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: [],
  data () {
    return {
      options: {
        products: [],
        paymentTypes: [],
        paymentStates: [],
        emails: [],
        businessEntities: [],
      },
      params: {
        product: null,
        paymentType: null,
        paymentState: null,
        orderPrice: null,
        email: null,
        name: null,
        phone: null,
        businessEntity: null,
        company: null,
        comment: null,
      },
      isLoading: false
    }
  },
  methods: {
    saveOrder () {
      axios.post(`/webapi/orders`, {
        data: this.params
      }).then((response) => {
        console.log(response.data)
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
    }
  },
  computed: {
    //
  },
  mounted() {
    axios.get('/webapi/orders/create').then((response) => {
      this.options.products = response.data.products.data
      this.options.paymentTypes = response.data.paymentTypes.data
      this.options.paymentStates = response.data.paymentStates.data
      this.options.businessEntities = response.data.businessEntities.data

      this.params.businessEntity = this.options.businessEntities[0]
    })
  }
}
