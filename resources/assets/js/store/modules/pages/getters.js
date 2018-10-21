export default {
  currentModule (state) {
    return state.currentModule
  },
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
  editedPageId (state) {
    return state.editedPageId
  },
  categoriesOptions (state) {
    return state.options.categories
  },
  getCategoriesParams (state) {
    return state.params.categories
  },
  themesOptions (state) {
    return state.options.themes
  },
  getThemesParams (state) {
    return state.params.themes
  },
}
