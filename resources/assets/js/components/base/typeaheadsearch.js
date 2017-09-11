import Autocomplete from 'v-autocomplete'
import ItemTemplate from './TypeaheadSearch/ItemTemplate.vue'

export default {
  components: { Autocomplete },
  props: ['column'],
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
        { id:1, email:'begimov@gmail.com' },
        { id:2, email:'begimov@aideus.com' },
        { id:2, email:'begimov@begimov.com' },
      ]
    },
    getLabel (item) {
      return item[this.column]
    },
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
