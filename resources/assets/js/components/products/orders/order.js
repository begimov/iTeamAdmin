export default {
  props: ['order', 'paymentStates'],
  data () {
    return {
      //
    }
  },
  methods: {
    deleteOrder () {
      axios.delete(`/webapi/orders/${this.order.id}`).then((response) => {
        console.log(response)
      })
    },
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
