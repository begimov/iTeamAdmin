export default {
  data () {
    return {
      question: {
        question: ''
      }
    }
  },
  watch: {
    question: {
        handler: function (question) {
            this.$emit('input', question);
        },
        deep: true
    }
  }
}
