export default {
  id (state) {
    return state.params.id
  },
  getName (state) {
    return state.params.name
  },
  isLoading (state) {
    return state.isLoading
  },
}
