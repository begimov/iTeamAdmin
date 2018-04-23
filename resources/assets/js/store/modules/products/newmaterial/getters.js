export default {
  id (state) {
    return state.params.id
  },
  getName (state) {
    return state.params.name
  },
  getVideoId (state) {
    return state.options.video.id
  },
  isLoading (state) {
    return state.isLoading
  },
}
