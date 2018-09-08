export default {
  data () {
    return {
      question: {
        question: '',
        answers: []
      }
    }
  },
  watch: {
    question: {
        handler: function (question) {
            this.$emit('input', question)
        },
        deep: true
    }
  },
  methods: {
    addAnswer() {
      this.question.answers.push({})
    },
    removeQuestion() {
      this.$emit('removeQuestion')
    }
  }
}
