import Autocomplete from 'v-autocomplete'
import ItemTemplate from './TypeaheadSearch/ItemTemplate.vue'

export default {
  components: { Autocomplete },
  props: [],
  data () {
    return {
      query: null,
      options: [],
      template: ItemTemplate
    }
  },
  methods: {
    change (data) {
      this.$emit('input', data)
    },
    updateItems (text) {
      //
    },
    getLabel (item) {
      return item.value
    },
  },
  computed: {
    //
  },
  mounted() {
    axios.get('/webapi/users/emails').then((response) => {
      // this.options.products = response.data.products.data
      console.log(response.data)
    })
  }
}
