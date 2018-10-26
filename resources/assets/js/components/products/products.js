import { mapActions, mapGetters } from 'vuex'
import Multiselect from 'vue-multiselect'

export default {
  components: { Multiselect },
  props: {
    categories: {
      required: true,
      type: Array
    }
  },
  data () {
    return {
      timer: 0,
    }
  },
  computed: {
      ...mapGetters('products', [
          'currentModule',
          'products',
          'meta',
          'isLoading',
          'editedProductId',
          'categoriesOptions',
          'getCategoriesParams',
          'getOrderByParams',
          'getCostParams',
          'costOptions'
      ]),
      'searchQuery': {
        get () {
          return this.getSearchQuery
        },
        set (value) {
          this.updateSearchQuery(value)
        }
      },
      'categoriesParams': {
        get () {
          return this.getCategoriesParams
        },
        set (category) {
          this.updateCategoriesParams(category)
        }
      },
      'orderByParams': {
        get () {
          return this.getOrderByParams
        },
        set (data) {
          this.updateOrderByParams(data)
          this.getProducts(this.meta.pagination.current_page)
        }
      },
      'costParams': {
        get () {
          return this.getCostParams
        },
        set (data) {
          this.updateCostParams(data)
        }
      },
  },
  methods: {
      ...mapActions('products', [
          'getProducts',
          'updateSearchQuery',
          'setCurrentModule',
          'setEditedProductId',
          'updateCategoriesParams',
          'updateOrderByParams',
          'updateCostParams'
      ]),
      textSearch () {
        clearTimeout(this.timer);
        this.timer = setTimeout(function(){
            this.getProducts()
        }.bind(this), 1000)
      },
      cancelNewProduct() {
        this.setEditedProductId(null)
        this.setCurrentModule('products')
      }
  },
  mounted() {
    this.getProducts()
    this.$store.state.products.options.categories = this.categories
  }
}
