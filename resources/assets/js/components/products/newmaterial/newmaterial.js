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
    //
  },
  mounted() {
    this.getMaterialId()
  }
}
