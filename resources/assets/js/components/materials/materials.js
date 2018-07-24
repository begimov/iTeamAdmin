import { mapActions, mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters('materials', [
      'currentModule',
      'isLoading',
      'materials',
      'meta',
      'editedMaterialId',
      'getSearchQuery',
    ]),
    'searchQuery': {
      get () {
        return this.getSearchQuery
      },
      set (value) {
        this.updateSearchQuery(value)
      }
    },
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
    },
    textSearch () {
      clearTimeout(this.timer);
      this.timer = setTimeout(function(){
          this.getMaterials()
      }.bind(this), 1000)
    },
  },
  mounted() {
    this.getMaterials()
  }
}
