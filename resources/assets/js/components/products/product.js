import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['product'],
  data () {
    return {
      //
    }
  },
  methods: {
    editProduct() {
      this.$emit('editProduct', this.product.id)
    }
    
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
