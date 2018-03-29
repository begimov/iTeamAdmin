export default {
  setIsLoading (state, value) {
      state.isLoading = value
  },
  setBlocks (state, value) {
      state.blocks = value
  },
  updatePageName (state, name) {
      state.page.name = name
  },
  updatePageDesc (state, desc) {
      state.page.desc = desc
  },
  addBlockToLayout (state, data) {
      state.layout.blocks.push(data)
  },
  addElementToElements (state, value) {
      state.layout.elements.push(value)
  },
  deleteElement (state, id) {
      state.layout.blocks = _.filter(state.layout.blocks, function(o) { return o.id != id; })
      state.layout.elements = _.filter(state.layout.elements, function(o) { return o.id != id; })
  },
}
