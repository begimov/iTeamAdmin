import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['page'],
  methods: {
    updatePageStatus (status) {
      if (status === 'unpublish')
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
