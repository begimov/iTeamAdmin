import { mapActions, mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters('materials', [
      'currentModule',
      'isLoading',
      'materials',
      'meta',
      'editedMaterialId'
    ]),
  },
  methods: {
    ...mapActions('materials', [
      'getMaterials',
      'setCurrentModule',
      'setEditedMaterialId'
    ]),
    cancelNewMaterial() {
      this.setEditedMaterialId(null)
      this.setCurrentModule('materials')
    }
  },
  mounted() {
    this.getMaterials()
  }
}
