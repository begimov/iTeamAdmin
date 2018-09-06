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
  typeOptions (state) {
    return state.options.types
  },
  typeParams (state) {
    return state.test.type
  },
  isLoading (state) {
    return state.isLoading
  },
  // errors (state) {
  //   return state.errors
  // },
}
