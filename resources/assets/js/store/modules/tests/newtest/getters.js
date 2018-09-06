export default {
  testname (state) {
    return state.test.name
  },
  testdesc (state) {
    return state.test.desc
  },
  // blocks (state) {
  //   return state.blocks
  // },
  // layout (state) {
  //   return state.layout
  // },
  // categoryOptions (state) {
  //   return state.options.categories
  // },
  // categoryParams (state) {
  //   return state.page.category
  // },
  // themeOptions (state) {
  //   return state.options.themes
  // },
  // themeParams (state) {
  //   return state.page.theme
  // },
  isLoading (state) {
    return state.isLoading
  },
  // errors (state) {
  //   return state.errors
  // },
}
