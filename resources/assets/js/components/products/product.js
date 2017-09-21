export default {
  props: ['order', 'paymentStates'],
  data () {
    return {
      //
    }
  },
  methods: {
    deleteOrder () {
      if (confirm(`Вы уверены, что хотите удалить заказ № ${this.order.id}?`)) {
        axios.delete(`/webapi/orders/${this.order.id}`).then((response) => {
          this.$emit('orderDeleted')
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
