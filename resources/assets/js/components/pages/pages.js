import { mapActions, mapGetters } from 'vuex'

export default {
  components: {},
  props: [],
  data () {
    return {
      timer: 0,
      // TODO: REMOVE
      blocks: [
        {name: 'main-block'},
        {name: 'async-example'},
      ],
      layout: [0],
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
    Vue.component('async-example', function (resolve, reject) {
        let comp = {
          template: '<div>Я — асинхронный!</div>',
          data: {
            par1: 'par1',
            par2: 'par2',
          }
        }
        resolve({
          template: comp.template,
          data () {
            return comp.data
          }
        })
    })

    setTimeout(() => {
      this.layout.push(1)
    }, 2000)
  }
}
