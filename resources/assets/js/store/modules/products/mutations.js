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
  setEditedProductId (state, id) {
    state.editedProductId = id
  },
  updateCategoriesParams (state, categories) {
    state.params.categories = categories
  },
  updateOrderByParams (state, params) {
    state.params.orderBy = params
  },
}
