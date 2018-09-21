import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['test'],
  methods: {
    editPage() {
      this.$emit('editTest', this.test.id)
    }
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
