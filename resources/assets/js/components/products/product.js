import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['product'],
  data () {
    return {
      //
    }
  },
  methods: {
    deleteProduct () {
      if (confirm(`Вы уверены, что хотите удалить заказ № ${this.product.id}?`)) {
        axios.delete(`/webapi/products/${this.product.id}`).then((response) => {
          this.$emit('productDeleted')
        })
      } else {
        // Do nothing!
      }
    },
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
