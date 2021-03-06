import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: ['editedProductId'],
  data () {
    return {
      //
    }
  },
  methods: {
      ...mapActions('products/newproduct', [
          'getInitialData',
          'updateMaterialParams',
          'updateTestParams',
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
          'setProductToEdit',
          'removeMaterial',
          'removeTest',
          'updateProduct'
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
          'testOptions',
          'testParams',
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
    if (this.editedProductId) {
      this.setProductToEdit(this.editedProductId)
    }
  }
}
