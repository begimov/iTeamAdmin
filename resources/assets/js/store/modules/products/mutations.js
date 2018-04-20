export default {
  setProducts (state, products) {
    state.products = products.data
    state.meta = products.meta
  },
  setIsLoading (state, flag) {
    state.isLoading = flag
  },
  updateSearchQuery (state, value) {
      state.params.searchQuery = value
  },
  setCurrentModule (state, value) {
    state.currentModule = value
},
}
