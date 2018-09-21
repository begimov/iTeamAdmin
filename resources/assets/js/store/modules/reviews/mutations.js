export default {
  setReviews (state, reviews) {
    state.reviews = reviews.data
    state.meta = reviews.meta
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
