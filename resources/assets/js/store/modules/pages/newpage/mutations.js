export default {
  setIsLoading (state, value) {
      state.isLoading = value
  },
  setBlocks (state, value) {
      state.blocks = value
  },
  addBlockToLayout (state, data) {
      state.layout.blocks.push(data)
  },
  addComponentToComponents (state, value) {
      state.layout.components.push(value)
  },
  deleteElement (state, id) {
      state.layout.blocks = _.filter(state.layout.blocks, function(o) { return o.id != id; })
      state.layout.components = _.filter(state.layout.components, function(o) { return o.id != id; })
  },
}
