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
    ]),
    cancel () {
      // this.resetState()
      this.$emit('cancelNewMaterial')
    }
  },
  computed: {
    ...mapGetters('products/newmaterial', [
      'id',
      'getName',
      'getVideoId',
      'isLoading',
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
    // TODO: generate fresh id each time (safe) or use previous unsaved id?
    if (!this.id) {
      this.getMaterialId()
    }
  }
}
