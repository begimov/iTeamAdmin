export default {
  currentModule (state) {
    return state.currentModule
  },
  reviews (state) {
    return state.reviews
  },
  // meta (state) {
  //   return state.meta
  // },
  isLoading (state) {
    return state.isLoading
  },
  getSearchQuery (state) {
    return state.params.searchQuery
  },
  // editedTestId (state) {
  //   return state.editedTestId
  // },
}
