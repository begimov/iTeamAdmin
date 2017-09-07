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
        opf: [
          { id: 1, name: 'ООО'},
          { id: 2, name: 'ОАО'},
          { id: 3, name: 'ЗАО'},
        ],
        companies: [
          { id: 1, name: 'Компания 1'},
          { id: 2, name: 'Компания 2'},
          { id: 3, name: 'Компания 3'},
        ],
      },
      params: {
        product: null,
        paymentType: null,
        paymentState: null,
        email: null,
        name: null,
        phone: null,
        orderPrice: null,
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
    updateEmails () {
      console.log('UPDATED')
    },
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
