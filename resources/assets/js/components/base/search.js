export default {
  data () {
    return {
      query: '',
    }
  },
  methods: {
    changed () {
      this.$emit('input', this.query)
    }
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
