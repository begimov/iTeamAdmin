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
      this.options = [
        { id:1, value:'begimov@gmail.com' },
        { id:2, value:'begimov@aideus.com' },
        { id:2, value:'begimov@begimov.com' },
      ]
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
