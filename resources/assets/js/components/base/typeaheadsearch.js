import Autocomplete from 'v-autocomplete'
import ItemTemplate from './TypeaheadSearch/ItemTemplate.vue'

export default {
  components: { Autocomplete },
  props: [],
  data () {
    return {
      query: null,
      options: [
        { id: 1, value: 'dfgdfgdg'}
      ],
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
    //
  }
}
