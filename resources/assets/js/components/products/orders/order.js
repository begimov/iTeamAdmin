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
    editOrder() {
      this.$emit('editOrder', this.order.id)
    }
  },
  watch: {
    selectedPaymentStateId: {
      handler: function(id) {
        axios.patch(`/webapi/orders/${this.order.id}`, {
          payment_state_id: id
        }).then((response) => {
          //
        })
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
