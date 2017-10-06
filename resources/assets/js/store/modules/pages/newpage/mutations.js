export default {
  setIsLoading (state, value) {
      state.isLoading = value
  },
  setBlocks (state, value) {
      state.blocks = value
  },
  addBlockToLayout (state, value) {
      state.layout.push(value)
  },
}
