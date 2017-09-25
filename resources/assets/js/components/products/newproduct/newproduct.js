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
      }
  },
  mounted() {
    //
  }
}
