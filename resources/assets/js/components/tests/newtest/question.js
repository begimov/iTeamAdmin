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
        sort_order: 0,
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
