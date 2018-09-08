export default {
  data () {
    return {
      condition: {
        name: '',
        description: '',
        score: null
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
