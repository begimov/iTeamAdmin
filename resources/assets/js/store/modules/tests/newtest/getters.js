export default {
  testname (state) {
    return state.test.name
  },
  testdesc (state) {
    return state.test.desc
  },
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
