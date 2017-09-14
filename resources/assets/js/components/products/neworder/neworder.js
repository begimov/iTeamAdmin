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
        data: _.omitBy(this.params, function(param, key) {
          return _.isNull(param)
        })
      }).then((response) => {
        //
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
  watch: {
    'params.company': function (company) {
      if (company && company.businessEntity) {
        this.params.businessEntity = this.options.businessEntities[company.businessEntity - 1]
      } else {
        // this.params.company = null
        this.params.businessEntity = this.options.businessEntities[0]
      }
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

      this.params.paymentState = this.options.paymentStates[0]
      this.params.businessEntity = this.options.businessEntities[0]
    })
  }
}
