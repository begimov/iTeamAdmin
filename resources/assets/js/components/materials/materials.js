import { mapActions, mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters('materials', [
      'currentModule',
    ]),
  },
  methods: {
    //
  },
  mounted() {
    //
  }
}
