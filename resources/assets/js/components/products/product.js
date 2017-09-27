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
    //
  },
  mounted() {
    //
  }
}
