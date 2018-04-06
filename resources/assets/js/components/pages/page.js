import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['page'],
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
  mounted() {
    console.log(this.page)
  }
}
