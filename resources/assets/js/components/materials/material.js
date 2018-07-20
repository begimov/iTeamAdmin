import { mapActions, mapGetters } from 'vuex'

export default {
  props: ['material'],
  methods: {
    editMaterial() {
      this.$emit('editMaterial', this.material.id)
    }
  },
  mounted() {
    //
  }
}
