export default {
  props: ['order', 'paymentStates'],
  data () {
    return {
      selectedPaymentStateId: this.order.payment_state_id
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
  watch: {
    selectedPaymentStateId: {
      handler: function(id) {
        console.log(id)
      }
    }
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
