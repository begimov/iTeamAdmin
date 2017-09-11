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
        opf: [
          { id: 1, name: 'ООО'},
          { id: 2, name: 'ОАО'},
          { id: 3, name: 'ЗАО'},
        ],
      },
      params: {
        product: null,
        paymentType: null,
        paymentState: null,
        orderPrice: null,
        email: null,
        opf: null,
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
