export default {
  props: {
    pagination: Object,
    for: {
      type: String,
      default: 'default'
    }
  },
  data () {
    return {
      //
    }
  },
  methods: {
    gotoPage (page) {
      this.$emit(this.for + '_pageChanged', page)
    }
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
