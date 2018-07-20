import { mapActions, mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters('materials', [
      'currentModule',
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
