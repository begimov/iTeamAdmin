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
      'setCurrentModule',
    ]),
    cancelNewMaterial() {
      // this.setEditedProductId(null)
      this.setCurrentModule('materials')
    }
  },
  mounted() {
    this.getMaterials()
  }
}
