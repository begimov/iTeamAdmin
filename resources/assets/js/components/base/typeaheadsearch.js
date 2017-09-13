import Autocomplete from 'v-autocomplete'
import ItemTemplate from './TypeaheadSearch/ItemTemplate.vue'

export default {
  components: { Autocomplete },
  props: ['user','data'],
  data () {
    return {
      query: null,
      options: [],
      template: ItemTemplate,
      isLoading: false,
    }
  },
  methods: {
    change (data) {
      this.$emit('input', data)
    },
    updateItems (text) {
      this.isLoading = true;
      axios.get(`/webapi/users/${this.data}?query=${text}`).then((response) => {
        this.options = response.data.data
        this.isLoading = false;
      })
    },
    getLabel (item) {
      return item.value
    },
  },
  watch: {
    user: function () {
      if (this.user) {
        this.isLoading = true;
        axios.get(`/webapi/user/${this.user.id}/${this.data}`).then((response) => {
          this.query = response.data.data
          this.isLoading = false;
        })
      } else {
        this.query = null;
      }
    }
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
