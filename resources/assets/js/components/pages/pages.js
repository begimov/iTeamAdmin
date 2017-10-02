import { mapActions, mapGetters } from 'vuex'

export default {
  components: {},
  props: [],
  data () {
    return {
      timer: 0,
      page: "<div class=\"row\">\n    <div class=\"panel panel-default\">\n      <div class=\"panel-body\">\n        <strong>MAIN.BLADE<\/strong>\n          <p id=\"main_1\"><\/p>\n          <a id=\"main_2\" href=\"\">Link<\/a><\/p>\n      <\/div>\n    <\/div>\n  <\/div>\n"
    }
  },
  computed: {
      ...mapGetters('products', [
          'products',
          'meta',
          'isLoading'
      ]),
      'searchQuery': {
        get () {
          return this.getSearchQuery
        },
        set (value) {
          this.updateSearchQuery(value)
        }
      },
  },
  methods: {
      ...mapActions('products', [
          'getProducts',
          'updateSearchQuery',
      ]),
      textSearch () {
        clearTimeout(this.timer);
        this.timer = setTimeout(function(){
            this.getProducts()
        }.bind(this), 1000)
      },
  },
  mounted() {
    this.getProducts()
  }
}
