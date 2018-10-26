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
  editedProductId (state) {
    return state.editedProductId
  },
  categoriesOptions (state) {
    return state.options.categories
  },
  getCategoriesParams (state) {
    return state.params.categories
  },
  getOrderByParams (state) {
    return state.params.orderBy
  },
  costOptions (state) {
    return state.options.cost
  },
  getCostParams (state) {
    return state.params.cost
  },
}
