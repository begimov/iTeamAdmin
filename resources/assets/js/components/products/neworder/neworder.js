import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: [],
  data () {
    return {
      products: [
        { id: 1, name: 'Продукт 1' },
        { id: 2, name: 'Продукт 2' },
        { id: 3, name: 'Продукт 3' },
      ],
      params: {
        products: []
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
