import { mapActions, mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters('materials', [
      'currentModule',
      'isLoading',
      'materials',
      'meta',
    ]),
  },
  methods: {
    ...mapActions('materials', [
      'getMaterials',
    ]),
  },
  mounted() {
    this.getMaterials()
  }
}
