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
      ])
  },
  computed: {
      ...mapGetters('products/newproduct', [
          'materialOptions',
          'materialParams',
          'categoryOptions',
          'categoryParams',
      ])
  },
  mounted() {
    //
  }
}
