import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['editedMaterialId'],
  data() {
    return {
      //
    }
  },
  methods: {
    ...mapActions('products/newmaterial', [
      'getMaterialId',
      'saveMaterial',
      'updateName',
      'updateVideoId',
      'addVideo',
      'removeVideo',
      'resetState',
      'cancel',
      'setMaterialToEdit',
      'removeDeletedFile',
      'updateMaterial'
    ]),
    cancelMaterial() {
      this.cancel()
      this.$emit('cancelNewMaterial')
    },
    saveNewMaterial() {
      this.saveMaterial()
      this.$emit('cancelNewMaterial')
    },
    removeFile(id) {
      axios.delete(`/webapi/files/${id}`).then(res => {
        this.removeDeletedFile(id)
      })
    }
  },
  computed: {
    ...mapGetters('products/newmaterial', [
      'id',
      'getName',
      'getVideoId',
      'isLoading',
      'videos',
      'errors',
      'files',
    ]),
    'name': {
      get () {
        return this.getName
      },
      set (value) {
        this.updateName(value)
      }
    },
    'videoId': {
      get () {
        return this.getVideoId
      },
      set (value) {
        this.updateVideoId(value)
      }
    }
  },
  mounted() {
    if (!this.id && !this.editedMaterialId) {
      this.getMaterialId()
    } else if(this.editedMaterialId) {
      this.setMaterialToEdit(this.editedMaterialId)
    }
  }
}
