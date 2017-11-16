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
    ]),
  },
  computed: {
    ...mapGetters('products/newmaterial', [
      'id',
      'getName',
    ]),
    'name': {
      get () {
        return this.getName
      },
      set (value) {
        this.updateName(value)
      }
    },
  },
  mounted() {
    // TODO: generate fresh id each time (safe) or use previous unsaved id?
    if (!this.id) {
      this.getMaterialId()
    }
  }
}
