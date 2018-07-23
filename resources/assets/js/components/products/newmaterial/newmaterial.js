import { mapActions, mapGetters } from 'vuex'

export default {
  props: [],
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
      'cancel'
    ]),
    cancelMaterial() {
      this.cancel()
      this.$emit('cancelNewMaterial')
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
    if (!this.id) {
      this.getMaterialId()
    }
  }
}
