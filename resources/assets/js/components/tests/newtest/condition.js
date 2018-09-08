export default {
  data () {
    return {
      condition: {
        name: '',
        description: '',
        score: 0
      }
    }
  },
  watch: {
    condition: {
        handler: function (condition) {
            this.$emit('input', condition);
        },
        deep: true
    }
  }
}
