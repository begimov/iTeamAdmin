import Multiselect from 'vue-multiselect'
import Autocomplete from 'v-autocomplete'

export default {
  components: { Multiselect, Autocomplete },
  props: [],
  data () {
    return {
      options: {
        products: [],
        paymentTypes: [],
        paymentStates: [],
        emails: [],
        names: [],
        phones: [],
        opf: [
          { id: 1, name: 'ООО'},
          { id: 2, name: 'ОАО'},
          { id: 3, name: 'ЗАО'},
        ],
        companies: [],
      },
      params: {
        product: null,
        paymentType: null,
        paymentState: null,
        orderPrice: null,
        email: null,
        name: null,
        phone: null,
        opf: null,
        company: null,
        comment: null,
      }
    }
  },
  methods: {
    saveOrder () {
      console.log('SAVE');
    },
    cancelOrder () {
      this.$emit('cancelOrder')
    },
    updateEmails (text) {
      // if response data is empty?
      // this.options.emails = []
      // this.options.emails.push(text)
    },
    updateNames (text) {
      //
    },
    updatePhones (text) {
      //
    },
    updateCompanies (text) {
      //
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
    })
  }
}
