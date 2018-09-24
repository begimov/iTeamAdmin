export default {
  isLoading (state) {
    return state.isLoading
  },
  author (state) {
    return state.review.author
  },
  position (state) {
    return state.review.position
  },
  quote (state) {
    return state.review.quote
  },
  // errors (state) {
  //   return state.errors
  // },
}
