export default {
  data () {
    return {
      answer: {
        answer: '',
        points: null,
        sort_order: 0
      }
    }
  },
  watch: {
    answer: {
        handler: function (answer) {
            this.$emit('input', answer);
        },
        deep: true
    }
  }
}
