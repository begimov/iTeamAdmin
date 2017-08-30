export default {
  props: ['pagination'],
  data () {
    return {
      //
    }
  },
  methods: {
    gotoPage (page) {
      this.$emit('pageChanged', page)
    }
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
