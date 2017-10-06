import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['page'],
  data () {
    return {
      //
    }
  },
  methods: {
    deletePage () {
      if (confirm(`Вы уверены, что хотите удалить страницу № ${this.page.id}?`)) {
        axios.delete(`/webapi/pages/${this.page.id}`).then((response) => {
          this.$emit('pageDeleted')
        })
      } else {
        // Do nothing!
      }
    },
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}