export default {
  data () {
    return {
      certificate: {
        score: null
      }
    }
  },
  watch: {
    certificate: {
        handler: function (certificate) {
            this.$emit('input', certificate);
        },
        deep: true
    }
  }
}
