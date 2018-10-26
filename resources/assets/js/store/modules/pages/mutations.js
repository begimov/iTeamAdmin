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
  setCurrentModule (state, value) {
      state.currentModule = value
  },
  setEditedPageId (state, id) {
    state.editedPageId = id
  },
  updateCategoriesParams (state, categories) {
    state.params.categories = categories
  },
  updateThemesParams (state, themes) {
    state.params.themes = themes
  },
  updateOrderByParams (state, params) {
    state.params.orderBy = params
  },
}
