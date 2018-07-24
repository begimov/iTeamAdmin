export default {
  currentModule (state) {
    return state.currentModule
  },
  isLoading (state) {
    return state.isLoading
  },
  materials (state) {
    return state.materials
  },
  meta (state) {
    return state.meta
  },
  // pagination (state) {
  //   return state.meta ? state.meta.pagination : null
  // },
  getSearchQuery (state) {
    return state.params.searchQuery
  },
  editedMaterialId (state) {
    return state.editedMaterialId
  },
}
