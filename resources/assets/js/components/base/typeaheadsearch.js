import Autocomplete from 'v-autocomplete'

export default {
  components: { Autocomplete },
  props: [],
  data () {
    return {
      query: null,
      options: [],
    }
  },
  methods: {
    change (data) {
      this.$emit('input', data)
    },
    updateItems (text) {
      this.options = [
        { id:1, value:'begimov@gmail.com' },
        { id:2, value:'begimov@aideus.com' }
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
