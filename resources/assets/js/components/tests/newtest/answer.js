export default {
  data () {
    return {
      answer: {
        answer: '',
        points: 0
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
