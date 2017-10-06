import { mapActions, mapGetters } from 'vuex'

export default {
  components: {},
  props: [],
  data () {
    return {
      timer: 0,
      blocks: [
        {name: 'async-example'},
      ],
      layout: [],
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
    let comp = {
      'async-example': {
        template: '<div>Я — асинхронный!</div>',
        data: {
          par1: 'par1',
          par2: 'par2',
        }
      }
    }
    _.forEach(comp, function(value, key) {
      Vue.component(key, function (resolve, reject) {
        resolve({
          template: value.template,
          data () {
            return value.data
          }
        })
      })
    });

    setTimeout(() => {
      this.layout.push(0)
    }, 2000)
  }
}
