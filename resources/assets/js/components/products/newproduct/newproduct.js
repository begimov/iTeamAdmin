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
          'getInitialData',
          'updateMaterialParams',
          'updateCategoryParams',
          'updateName',
          'updateBasePrice',
          'updatePriceTagPrice',
          'updatePriceTagName',
          'switchNewMaterial',
          'addPriceTag',
          'removePriceTag',
          'saveProduct',
          'resetState',
      ]),
      cancel () {
        this.resetState()
        this.$emit('cancelNewProduct')
      }
  },
  computed: {
      ...mapGetters('products/newproduct', [
          'materialOptions',
          'materialParams',
          'categoryOptions',
          'categoryParams',
          'getName',
          'getBasePrice',
          'getPriceTagPrice',
          'getPriceTagName',
          'isNewMaterialOn',
          'isLoading',
          'priceTags',
          'errors'
      ]),
      'name': {
        get () {
          return this.getName
        },
        set (value) {
          this.updateName(value)
        }
      },
      'basePrice': {
        get () {
          return this.getBasePrice
        },
        set (value) {
          this.updateBasePrice(value)
        }
      },
      'priceTagPrice': {
        get () {
          return this.getPriceTagPrice
        },
        set (value) {
          this.updatePriceTagPrice(value)
        }
      },
      'priceTagName': {
        get () {
          return this.getPriceTagName
        },
        set (value) {
          this.updatePriceTagName(value)
        }
      }
  },
  mounted() {
    this.getInitialData()
  }
}
