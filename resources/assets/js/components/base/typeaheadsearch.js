import Autocomplete from 'v-autocomplete'
import ItemTemplate from './TypeaheadSearch/ItemTemplate.vue'

export default {
  components: { Autocomplete },
  props: ['data'],
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
      axios.get(`/webapi/users/${this.data}?query=${text}`).then((response) => {
        this.options = response.data.data
      })
    },
    getLabel (item) {
      return item.value
    },
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
