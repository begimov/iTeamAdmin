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
        users: [],
        businessEntities: [],
      },
      params: {
        product: null,
        paymentType: null,
        paymentState: null,
        orderPrice: null,
        user: null,
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
      axios.get(`/webapi/users?query=${query}`).then((response) => {
        this.options.users = response.data.data
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
    })
  }
}
