import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: [],
  data () {
    return {
      //
    }
  },
  methods: {
      ...mapActions('products/newproduct', [
          'updateMaterialParams',
          'updateCategoryParams',
          'updateName',
          'updateBasePrice',
          'updatePriceTagPrice',
          'updatePriceTagName',
      ])
  },
  computed: {
      ...mapGetters('products/newproduct', [
          'materialOptions',
          'materialParams',
          'categoryOptions',
          'categoryParams',
      ]),
      'name': {
        get () {
          return this.$store.state.products.newproduct.params.name
        },
        set (value) {
          this.updateName(value)
        }
      },
      'basePrice': {
        get () {
          return this.$store.state.products.newproduct.params.basePrice
        },
        set (value) {
          this.updateBasePrice(value)
        }
      },
      'priceTagPrice': {
        get () {
          return this.$store.state.products.newproduct.options.priceTag.price
        },
        set (value) {
          this.updatePriceTagPrice(value)
        }
      },
      'priceTagName': {
        get () {
          return this.$store.state.products.newproduct.options.priceTag.name
        },
        set (value) {
          this.updatePriceTagName(value)
        }
      }
  },
  mounted() {
    //
  }
}
