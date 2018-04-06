import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['page'],
  methods: {
    deletePage () {
      if (confirm(`Вы уверены, что хотите снять с публикации страницу № ${this.page.id}?`)) {
        axios.delete(`/webapi/pages/${this.page.id}`).then((response) => {
          this.$emit('pageDeleted')
        })
      } else {
        // Do nothing!
      }
    },
  },
  mounted() {
    //
  }
}
