import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['page'],
  methods: {
    updatePageStatus (status) {
      switch (status) {
        case 'unpublish':
          if (confirm(`Вы уверены, что хотите снять с публикации страницу № ${this.page.id}?`)) {
            axios.patch(`/webapi/pages/${this.page.id}/status`, {
              status: 0
            }).then((response) => {
              this.$emit('pageStatusChanged')
            })
          } else {
            // Do nothing!
          }
          break;

        case 'publish':
          axios.patch(`/webapi/pages/${this.page.id}/status`, {
            status: 1
          }).then((response) => {
            this.$emit('pageStatusChanged')
          })
          break;

        default:
          break;
      }
    },
    editPage() {
      this.$emit('editPage', this.page.id)
    }
  },
  mounted() {
    //
  }
}
