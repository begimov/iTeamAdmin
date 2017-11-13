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
    ]),
  },
  computed: {
    ...mapGetters('products/newmaterial', [
      'id',
    ]),
  },
  mounted() {
    // TODO: generate fresh id each time (safe) or use previous unsaved id?
    if (!this.id) {
      this.getMaterialId()
    }
  }
}
