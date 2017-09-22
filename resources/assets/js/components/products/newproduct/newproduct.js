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
    deleteProduct () {
      // if (confirm(`Вы уверены, что хотите удалить заказ № ${this.order.id}?`)) {
      //   axios.delete(`/webapi/orders/${this.order.id}`).then((response) => {
      //     this.$emit('orderDeleted')
      //   })
      // } else {
      //   // Do nothing!
      // }
    },
  },
  computed: {
      ...mapGetters('products', [
          'products',
          'meta',
          'isLoadingProducts'
      ])
  },
  mounted() {
    //
  }
}
