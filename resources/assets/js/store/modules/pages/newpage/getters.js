export default {
  blocks (state) {
    return state.blocks
  },
  layout (state) {
    return state.layout.blocks
  },
  isLoading (state) {
    return state.isLoading
  },
  components (state) {
    return state.layout.components
  },
}
