import { mapActions, mapGetters } from 'vuex'

export default {
  components: {},
  props: [],
  data () {
    return {
      isShowingBlocksPanel: false,
      timer: 0,
      blocks: [
        {name: 'async-example'},
      ],
      layout: [],
    }
  },
  computed: {
      ...mapGetters('pages', [
          'pages',
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
      ...mapActions('pages', [
          'getPages',
          'updateSearchQuery',
      ]),
      textSearch () {
        clearTimeout(this.timer);
        this.timer = setTimeout(function(){
            this.getPages()
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
