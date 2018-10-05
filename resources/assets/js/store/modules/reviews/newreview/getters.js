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
  avatar (state) {
    return state.review.avatar
  },
  errors (state) {
    return state.errors
  },
}
