import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: [],
  data () {
    return {
      options: {
        products: [
          { id: 1, name: 'Продукт 1' },
          { id: 2, name: 'Продукт 2' },
          { id: 3, name: 'Продукт 3' },
        ],
        paymentTypes: [
          { id: 1, name: 'Я.Касса' },
          { id: 2, name: 'Карта' },
        ],
        paymentStates: [
          { id: 1, name: 'Не оплачен' },
          { id: 2, name: 'Оплачен' },
          { id: 3, name: 'Удален' },
        ],
      },
      params: {
        product: '',
        email: '',
        paymentType: '',
        paymentState: '',
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
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
