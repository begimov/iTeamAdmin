export default {
  data () {
    return {
      answer: {
        answer: '',
        points: null
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
