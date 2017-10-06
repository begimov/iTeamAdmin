export default {
  pages (state) {
    return state.pages
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
}
