export default {
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
  }
}
