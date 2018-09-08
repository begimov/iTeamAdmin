export default {
  props: {
    index: {
      type: Number,
      required: true
    }
  },
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
      this.$emit('removeQuestion', this.index)
    }
  }
}
