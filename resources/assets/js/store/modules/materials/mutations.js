export default {
  setMaterials (state, materials) {
    state.materials = materials.data
    state.meta = materials.meta
  },
  setIsLoading (state, flag) {
    state.isLoading = flag
  },
  // updateSearchQuery (state, value) {
  //     state.params.searchQuery = value
  // },
  // setCurrentModule (state, value) {
  //     state.currentModule = value
  // },
  // setEditedPageId (state, id) {
  //   state.editedPageId = id
  // },
}
