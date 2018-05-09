export default {
  currentModule (state) {
    return state.currentModule
  },
  products (state) {
    return state.products
  },
  meta (state) {
    return state.meta
  },
  pagination (state) {
    return state.meta ? state.meta.pagination : null
  },
  isLoading (state) {
    return state.isLoading
  },
  getSearchQuery (state) {
    return state.params.searchQuery
  },
  editProduct (state) {
    return state.editProduct
  },
}
