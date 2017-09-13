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
      console.log('SAVE');
    },
    cancelOrder () {
      this.$emit('cancelOrder')
    },
    getUsers (query) {
      this.isLoading = true
      console.log('GETTING USERS');
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
    })
  }
}
