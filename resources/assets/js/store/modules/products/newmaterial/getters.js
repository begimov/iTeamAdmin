export default {
  id (state) {
    return state.params.id
  },
  getName (state) {
    return state.params.name
  },
  getVideoId (state) {
    return state.options.video.identifier
  },
  isLoading (state) {
    return state.isLoading
  },
  videos (state) {
    return state.params.videos
  },
  errors (state) {
    return state.errors
  },
  files (state) {
    return state.options.files
  },
}
