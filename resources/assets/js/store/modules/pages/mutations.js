export default {
  setPages (state, pages) {
    state.pages = pages.data
    state.meta = pages.meta
  },
  setIsLoading (state, flag) {
    state.isLoading = flag
  },
  updateSearchQuery (state, value) {
      state.params.searchQuery = value
  },
}
