export default {
  setTests (state, tests) {
    state.tests = tests.data
    state.meta = tests.meta
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
